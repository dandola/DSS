<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('HUST',1);
define('NEU', 2);
define('NUCE', 3);
define('MALE', 1);

class Main extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('school_model');
        $this->load->model('major_model');
        $this->load->model('env_var_model');
    }

    public function index(){
        $this->data['schools']=$this->school_model->get_all();
        $this->load->view('home/view',$this->data);

    }
    public function load_major(){
        $school_id=$this->input->post('school_id');
        if(isset($school_id)){
                $data=$this->major_model->get_list_by_school_id($school_id);
                foreach ($data as $major) {
                    echo '<option value='.$major->id.'>'.$major->name.'</option>';
                }

            }
    }
    public function manage(){
        $this->data['schools']=$this->school_model->get_all();
         $this->data['env_vars']=$this->env_var_model->get_all();
        
    }
    public function process(){
        $name=$this->input->post("name");
        $gender=$this->input->post("gender");
        $math=$this->input->post("math");
        $physics=$this->input->post("physics");
        $other=$this->input->post("other");
        $area_point=$this->input->post("area_point");
        $prior=$this->input->post("prior");
        $school_id=$this->input->post("school_id");
        $majors= $this->input->post("majors");
        // echo "đầu vào: ";
        // echo "toán: ".$math."   lý: ".$physics."  hoá: ".$other."  điểm ưu tiên".($area_point+ $prior);
        // echo "các ngành: ";
        // var_dump($majors);
        // echo "<br>";     
        if(!empty($school_id) && is_numeric($school_id)){
            $result = $this->make_decision($gender,$math,$physics,$other,$area_point,$prior,$school_id,$majors);
            if($result){
                echo json_encode(array(
                        'status' => 'SUCCESS',
                        'result' => $result
                    ));
                die();
            }
        }

        echo json_encode(array(
                'status' => 'FAIL',
                'message' => 'school id must not be null'
            )
        );
        
    }

    public function make_decision($gender,$math,$physics,$other,$area_point,$prio,$schoolid,$majors){
        $scores = array('math' => floatval ($math), 'physics' => floatval ($physics), 'other' => floatval ($other), 'prior' => ($area_point + $prio));
        $school_id = intval($schoolid);
        $major_chosen = $majors;
        $sex =intval($gender);
        //step 0
        $majors = $this->major_model->get_list_by_school_id($school_id);
        // major_id follow ascending order.
        $initial_arr = $this->init_variables($school_id, $major_chosen, $scores, $sex, $majors);

        //chuyen vi vector de de tinh toan hon
        $transpose_initial_arr = $this->transpose_array($initial_arr);
        // echo "<br>buoc 0: chuan vi de tinh toan";
        // echo "<pre>";
        // var_dump($transpose_initial_arr);

        // step 1: normalize values by normalized vector
        $normalized_arr = $this->normalized_vector($transpose_initial_arr);
        // echo "<br>bước 1: chuẩn hoá vecto: ";
        // echo "<pre>";
        // var_dump($normalized_arr);

        //step 2: calculate by weights
        $normalized_arr = $this->calculate_by_weights($normalized_arr);
        // echo "<br>bước 2: tính giá trị theo trọng số: ";
        // echo "<pre>";
        // var_dump($normalized_arr);
        //step 3: calculate ideal solutions
        $ideal_solutions_arr = $this->calculate_ideal_arr($normalized_arr);
        // echo "<br>bước 3: các giải pháp lý tưởng: ";
        // echo "<pre>";
        // var_dump($ideal_solutions_arr);

        // chuyen vi lai vector chuan hoa de tinh toan
        $transpose_normalized_arr = $this->transpose_array($normalized_arr);
        // them vao major_id de nhan dang ma nganh

        //step 4: calculate to ideal solutions
        $distance_to_ideal_solutions_arr = $this->calculate_to_ideal_solutions($ideal_solutions_arr, $transpose_normalized_arr);
        // echo "<br>bước 4: tính khoảng cách tới giải pháp lý tưởng: ";
        // echo "<pre>";
        // var_dump($distance_to_ideal_solutions_arr);
        //step 5: calculate familiar measures to ideal solutions
        $familar_measures_arr = $this->calculate_familiar_measures_to_ideal_sol($distance_to_ideal_solutions_arr);
        // echo "<br>bước 5: độ đo tương ứng tới giải pháp lý tưởng: ";
        // echo "<pre>";
        // var_dump($familar_measures_arr);
        // add id for major and order by familiar measures
        $result = $this->add_id_and_order_array($familar_measures_arr, $major_chosen, $majors);
        if(!empty($result)){
            return $result;
        }
        return false;

    }

    private function init_variables($school_id, $major_chosen, $scores, $sex, $majors){
        if($majors){
            $num_major = count($majors);

            // get total score
            $scores = $this->count_score($school_id, $scores);
            // echo "điểm 2016: ".$scores['score_1'];
            // echo " điểm 2017: ".$scores['score_2'];
            // init data
            $initial_arr = array();
            foreach ($majors as &$major){
                $major = (array)$major;
                $initial_ele = array();
                $initial_ele[] = $major['amount'];
                $initial_ele[] = round($scores['score_1']/$major['reference_1'], 4);
                $initial_ele[] = round($scores['score_2']/$major['reference_2'], 4);

                $is_hobby = in_array($major['id'], $major_chosen);
                $initial_ele[] = $is_hobby?1:0; // hobby

                $initial_ele[] = $major['work_opportunity'];
                $initial_ele[] = ($sex == MALE)?$major['rate_of_male']:( 1 - floatval($major['rate_of_male']));
                // push to initial data
                $initial_arr[] = $initial_ele;
            }
   
            return $initial_arr;
        }
        return false;
    }

    private function normalized_vector($data){
        if(!empty($data)){
            $normalized_arr = array();
            for ($i = 0; $i < count($data); $i++){
                $normalized_arr[] = $this->cal_normalized_vector($data[$i]);
            }
            return $normalized_arr;
        }
        return false;
    }

    private function calculate_by_weights($data){
        if(!empty($data)){
            $weights = $this->env_var_model->get_weights_by_types(array(AMOUNT, BIAS_1, BIAS_2, HOBBY, WORK_OPPORTUNITY, SEX));
            for($i = 0; $i < count($weights); $i++){
                $data[$i] = $this->multiple_weight($data[$i], $weights[$i]["weight"]);
            }
            return $data;
        }
        return false;
    }

    private function calculate_ideal_arr($data){
        if(!empty($data)){
            $best_values = array();
            $worst_values = array();
            for ($i = 0; $i < count($data); $i++){
                $best_values[] = max($data[$i]);
                $worst_values[] = min($data[$i]);
            }
            return array(
                'best' => $best_values,
                'worst' => $worst_values
            );
        }
        return false;
    }

    private function calculate_to_ideal_solutions($ideal_solutions_arr, $transpose_normalized_arr){
        if(!empty($transpose_normalized_arr) && !empty($ideal_solutions_arr)){
            $to_best_solutions = array();
            $to_worst_solutions = array();
            for($i = 0; $i < count($transpose_normalized_arr); $i++){
                $solution = $transpose_normalized_arr[$i];
                // distance between two vectors
                $to_best_solution = 0;
                $to_worst_solution = 0;
                for($j = 0; $j < count($solution); $j++){
                    $to_best_solution += pow($solution[$j] - $ideal_solutions_arr['best'][$j], 2);
                    $to_worst_solution += pow($solution[$j] - $ideal_solutions_arr['worst'][$j], 2);
                }
                $to_best_solutions[] = round(sqrt($to_best_solution), 4);
                $to_worst_solutions[] = round(sqrt($to_worst_solution), 4);
            }
            return array(
                'best' => $to_best_solutions,
                'worst' => $to_worst_solutions
            );
        }
        return false;
    }

    private function calculate_familiar_measures_to_ideal_sol($distance_to_ideal_solutions_arr){
        if(!empty($distance_to_ideal_solutions_arr)){
            $familiar_measures_arr = array();
            for($i = 0; $i < count($distance_to_ideal_solutions_arr['best']); $i++){
                $distance =
                    $distance_to_ideal_solutions_arr['worst'][$i]/($distance_to_ideal_solutions_arr['worst'][$i] + $distance_to_ideal_solutions_arr['best'][$i]);
                $familiar_measures_arr[] = round($distance, 4);
            }
            return $familiar_measures_arr;
        }
        return false;
    }

    private function add_id_and_order_array($familar_measures_arr, $major_chosen, $majors){
        if(!empty($familar_measures_arr) && !empty($majors)){
            $result = array();
            for ($i = 0; $i < count($familar_measures_arr); $i++){
                $result[] = array(
                    'id' => $majors[$i]->id,
                    'name' => $majors[$i]->name,
                    'value' => $familar_measures_arr[$i]
                );
            }
            //sort by value
            usort($result, function ($a, $b){
                return ($b['value'] - $a['value'])*10;
            });
            return $result;
        }
        return false;
    }

    ///////////SUPPORTED FUNCTION
    private function count_score($id, $scores){
        if(isset($id) && isset($scores)){
            $score_1 = 0;
            $score_2 = 0;
            if($id == 1){
                // echo "HUST <br>";
                $score_1 = round(($scores['math'] + $scores['physics'] + $scores['other']+ $scores['prior'])*1.0/3, 2) ;
                $score_2 = round(($scores['math']*2 + $scores['physics'] + $scores['other'])*0.75 + $scores['prior']*1.0/3, 2) ;
            }elseif($id == 3){
                // echo "NUCE <br>";
                $score_1 = round(($scores['math']*2 + $scores['physics'] + $scores['other'])*0.25  + $scores['prior']*1.0/3,2);
                $score_2 = round(($scores['math'] + $scores['physics'] + $scores['other'])*0.75, 2) + $scores['prior'];
            }else {
                // echo "ORTHER <br>";
                $score_1 =  round($scores['math'] + $scores['physics'] + $scores['other'], 2) + $scores['prior'];
                $score_2 = $score_1;
            }
            return array(
                'score_1' => $score_1,
                'score_2' => $score_2
            );
        }
        return false;
    }

    private function cal_normalized_vector($vectors){
        $sum = 0;
        for ($i = 0; $i < count($vectors); $i++){
            $sum += $vectors[$i]*$vectors[$i];
        }
        $sum = sqrt($sum);
        $normalized_vector = array();
        for ($i=0; $i < count($vectors); $i++){
            $normalized_vector[] = !empty($sum)?round($vectors[$i]/$sum, 4):0;
        }
        return $normalized_vector;
    }

    private function transpose_array($data){
        if(isset($data) && is_array($data)){
            $retData = array();
            foreach ($data as $row => $columns) {
                foreach ($columns as $row2 => $column2) {
                    $retData[$row2][$row] = $column2;
                }
            }
            return $retData;
        }
        return false;
    }

    private function multiple_weight($arr, $weight){
        if(isset($arr) && isset($weight)){
            for($i = 0; $i < count($arr); $i++){
                $arr[$i] = round($arr[$i]*$weight, 4);
            }
            return $arr;
        }
        return false;
    }
}