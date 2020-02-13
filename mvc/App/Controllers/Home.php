<?php
    namespace App\Controllers;
    use \Core\BaseView;
    use \App\Models\Post;
    use PDO;
    use \App\Controllers\Posts as edit;
    class Home extends \Core\BaseController {
        public function indexAction() {

            if(isset($_POST['submit'])) {
                if($this->validate($_POST)) {
                   $data = $this->converter($_POST) ;
                    $keys = array_keys($data);
                    $values = array_values($data);
                    Post::insertData('student',implode(", ", $keys),implode(", ", $values));
                    BaseView::renderTemplate('Home/index.html',['name'=>'aayusha']);
                }
                else {
                    
                    BaseView::renderTemplate('Home/index.html',['error'=>$this->error]);
                }
            }
            else {
                BaseView::renderTemplate('Home/index.html',['name'=>'aayusha']);
            }
        }
        public function editAction() {
            
            if(isset($_POST['submit']) && isset($this->route_params['id'])) {
                $updateData = [];
                if($this->validate($_POST)) {
                   $data = $this->converter($_POST) ;
                    foreach ($data as $key => $value) {
                        array_push($updateData, $key." = ".$value);
                    }
                    Post::updateData('student',implode(", ",$updateData),'student_id='.$this->route_params['id']);
                    $post = new edit($this->route_params);
                    $post->indexAction();
                    
                    
                }
                else {
                    
                    BaseView::renderTemplate('Home/index.html',['error'=>$this->error]);
                }
            }
            else {
                
                $data = Post::getAll('student','*','student_id='.$this->route_params['id']);
                BaseView::renderTemplate('Home/index.html',['edit'=>$data[0]]);
            }
        }
        protected function validate($fields) {
            $error = [];
            foreach ($fields as $key => $value) {
                switch ($key) {
                    case 'name':
                        if(empty($value)) {
                            $error['name'] = 'Invalid Name';
                        }
                    break;

                    case 'roll': 
                        if(empty($value) || !is_numeric($value)) {
                            $error['roll'] = 'Invalid Roll Number';
                        }
                        break;
                   
                }
            }
            $this->error = $error;
            return (empty($error))?true:false;
        }
        protected function converter($fields) {
            $data = [];
            foreach ($fields as $key => $value) {
                switch ($key) {
                    case 'name':
                        $data['studentName'] = "'".$value."'";
                    break;
                    case 'roll':
                        $data['rollNo'] = "'".$value."'";
                        break;
                   
                }
            }
            
            return $data;
        }
        public function deleteAction() {
            Post::deleteData('student','student_id='.$this->route_params['id']);
            $post = new edit($this->route_params);
            $post->indexAction();
        }
        protected function before() {
         //   echo "<br>(before)";
         
        }
        protected function after() {
           // echo "(after)";
        }
    }
?>