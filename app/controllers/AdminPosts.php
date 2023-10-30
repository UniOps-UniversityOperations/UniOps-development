<?php

    class AdminPosts extends Controller{

        public function __construct(){
            //echo 'This is the posts controller';
            $this->R_postModel = $this->model('M_Room');
            $this->S_postModel = $this->model('M_Subject');
            $this->L_postModel = $this->model('M_Lecturer');
        }



        //CRUD for Room

        public function createRoom(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Create Room',

                    'id' => trim($_POST['id']),
                    'name' => trim($_POST['name']),
                    'type' => trim($_POST['type']),
                    'capacity' => trim($_POST['capacity']),
                    'current_availability' => trim($_POST['current_availability']),
                    'no_of_tables' => trim($_POST['no_of_tables']),
                    'no_of_chairs' => trim($_POST['no_of_chairs']),
                    'no_of_boards' => trim($_POST['no_of_boards']),
                    'no_of_projectors' => trim($_POST['no_of_projectors']),
                    'no_of_computers' => trim($_POST['no_of_computers']),
                    'is_ac' => isset($_POST['is_ac']) ? '1' : '0',
                    'is_wifi' => isset($_POST['is_wifi']) ? '1' : '0',
                    'is_media' => isset($_POST['is_media']) ? '1' : '0',
                    'is_lecture' => isset($_POST['is_lecture']) ? '1' : '0',
                    'is_lab' => isset($_POST['is_lab']) ? '1' : '0',
                    'is_tutorial' => isset($_POST['is_tutorial']) ? '1' : '0',
                    'is_meeting' => isset($_POST['is_meeting']) ? '1' : '0',
                    'is_seminar' => isset($_POST['is_seminar']) ? '1' : '0',         
                    'is_exam' => isset($_POST['is_exam']) ? '1' : '0',
                    
                    'idError' => '',
                ];

                if(empty($data['id'])){
                    $data['idError'] = 'Please enter Room ID';
                }

                if(empty($data['idError'])){
                    if($this->R_postModel->createRoom($data)){
                        //flash('post_message', 'Room Added');
                        //redirect('pages/administrator_dashboard');
                        redirect('AdminPosts/viewRooms');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    $this->view('posts/v_createRoom', $data);
                }
            }  else{
                $data = [

                    'title' => 'Create Room',

                    'id' => '',
                    'name' => '',
                    'type' => '',
                    'capacity' => '',
                    'current_availability' => '',
                    'no_of_tables' => '',
                    'no_of_chairs' => '',
                    'no_of_boards' => '',
                    'no_of_projectors' => '',
                    'no_of_computers' => '',
                    'is_ac' => '',
                    'is_wifi' => '',
                    'is_media' => '',
                    'is_lecture' => '',
                    'is_lab' => '',
                    'is_tutorial' => '',
                    'is_meeting' => '',
                    'is_seminar' => '',         
                    'is_exam' => '',
                    
                    'idError' => '',
                ];
                $this->view('AdminPosts/v_createRoom', $data);
            }  
        }

        //show all rooms
        public function viewRooms(){
            $posts = $this->R_postModel->getRooms();
            $data = [
                'title' => 'View Rooms',
                'posts' => $posts
            ];
            $this->view('AdminPosts/v_viewRooms', $data);
        }

        public function updateRoom($postId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Update Room',
                    'postId' => $postId,

                    'id' => trim($_POST['id']),
                    'name' => trim($_POST['name']),
                    'type' => trim($_POST['type']),
                    'capacity' => trim($_POST['capacity']),
                    'current_availability' => trim($_POST['current_availability']),
                    'no_of_tables' => trim($_POST['no_of_tables']),
                    'no_of_chairs' => trim($_POST['no_of_chairs']),
                    'no_of_boards' => trim($_POST['no_of_boards']),
                    'no_of_projectors' => trim($_POST['no_of_projectors']),
                    'no_of_computers' => trim($_POST['no_of_computers']),
                    'is_ac' => isset($_POST['is_ac']) ? '1' : '0',
                    'is_wifi' => isset($_POST['is_wifi']) ? '1' : '0',
                    'is_media' => isset($_POST['is_media']) ? '1' : '0',
                    'is_lecture' => isset($_POST['is_lecture']) ? '1' : '0',
                    'is_lab' => isset($_POST['is_lab']) ? '1' : '0',
                    'is_tutorial' => isset($_POST['is_tutorial']) ? '1' : '0',
                    'is_meeting' => isset($_POST['is_meeting']) ? '1' : '0',
                    'is_seminar' => isset($_POST['is_seminar']) ? '1' : '0',         
                    'is_exam' => isset($_POST['is_exam']) ? '1' : '0',
                    
                ];

                if(1){
                    if($this->R_postModel->updateRoom($data)){
                        redirect('AdminPosts/viewRooms');
                    }else{
                        die('Something went wrong');
                    }
                }
            }else{
                $post = $this->R_postModel->getRoomById($postId);
                $data = [
                    'title' => 'Update Room',

                    'id' => $post->id,
                    'name' => $post->name,
                    'type' => $post->type,
                    'capacity' => $post->capacity,
                    'current_availability' => $post->current_availability,
                    'no_of_tables' => $post->no_of_tables,
                    'no_of_chairs' => $post->no_of_chairs,
                    'no_of_boards' => $post->no_of_boards,
                    'no_of_projectors' => $post->no_of_projectors,
                    'no_of_computers' => $post->no_of_computers,
                    'is_ac' => $post->is_ac,
                    'is_wifi' => $post->is_wifi,
                    'is_media' => $post->is_media,
                    'is_lecture' => $post->is_lecture,
                    'is_lab' => $post->is_lab,
                    'is_tutorial' => $post->is_tutorial,
                    'is_meeting' => $post->is_meeting,
                    'is_seminar' => $post->is_seminar,         
                    'is_exam' => $post->is_exam,
                ];
                $this->view('AdminPosts/v_updateRoom', $data);
            }
               
        }

        public function deleteRoom($postId){
            if($this->R_postModel->deleteRoom($postId)){
                redirect('AdminPosts/viewRooms');
            }else{
                die('Something went wrong');
            }
        }



        //CRUD for Subject

        public function createSubject(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Create Subject',

                    's_code' => trim($_POST['s_code']),
                    's_name' => trim($_POST['s_name']),
                    's_credits' => trim($_POST['s_credits']),
                    's_year' => trim($_POST['s_year']),
                    's_semester' => trim($_POST['s_semester']),
                    's_type' => trim($_POST['s_type']),
                    
                    's_codeError' => '',
                ];

                if(empty($data['s_code'])){
                    $data['s_codeError'] = 'Please enter Subject Code';
                }

                if(empty($data['s_codeError'])){
                    if($this->S_postModel->createSubject($data)){
                        //flash('post_message', 'Subject Added');
                        //redirect('pages/administrator_dashboard');
                        redirect('AdminPosts/viewSubjects');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    $this->view('posts/v_createSubject', $data);

                }
            }  else{
                $data = [

                    'title' => 'Create Subject',

                    's_code' => '',
                    's_name' => '',
                    's_credits' => '',
                    's_year' => '',
                    's_semester' => '',
                    's_type' => '',
                    
                    's_codeError' => '',
                ];
                $this->view('AdminPosts/v_createSubject', $data);
            }  
        }

        //show all subjects
        public function viewSubjects(){
            $posts = $this->S_postModel->getSubjects();
            $data = [
                'title' => 'View Subjects',
                'posts' => $posts
            ];
            $this->view('AdminPosts/v_viewSubjects', $data);
        }

        public function updateSubject($postId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Update Subject',
                    'postId' => $postId,

                    's_id' => trim($_POST['s_id']), //added
                    's_code' => trim($_POST['s_code']),
                    's_name' => trim($_POST['s_name']),
                    's_credits' => trim($_POST['s_credits']),
                    's_year' => trim($_POST['s_year']),
                    's_semester' => trim($_POST['s_semester']),
                    's_type' => trim($_POST['s_type']),
                    
                ];

                if(1){
                    if($this->S_postModel->updateSubject($data)){
                        redirect('AdminPosts/viewSubjects');
                    }else{
                        die('Something went wrong');
                    }
                }
            }else{
                $post = $this->S_postModel->getSubjectById($postId);
                $data = [
                    'title' => 'Update Subject',

                    's_id' => $post->s_id, //added
                    's_code' => $post->s_code,
                    's_name' => $post->s_name,
                    's_credits' => $post->s_credits,
                    's_year' => $post->s_year,
                    's_semester' => $post->s_semester,
                    's_type' => $post->s_type,
                ];
                $this->view('AdminPosts/v_updateSubject', $data);
            }
        }

        public function deleteSubject($postId){
            if($this->S_postModel->deleteSubject($postId)){
                redirect('AdminPosts/viewSubjects');
            }else{
                die('Something went wrong');
            }
        }


        //CRUD for Lecturer

        public function createLecturer(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Create Lecturer',

                    'l_name' => trim($_POST['l_name']),
                    'l_email' => trim($_POST['l_email']),
                    'l_sub1_code' => trim($_POST['l_sub1_code']),
                    'l_sub2_code' => trim($_POST['l_sub2_code']),
                    'l_sub3_code' => trim($_POST['l_sub3_code']),
                    'l_exp1_code' => trim($_POST['l_exp1_code']),
                    'l_exp2_code' => trim($_POST['l_exp2_code']),
                    'l_exp3_code' => trim($_POST['l_exp3_code']),
                    'l_second_examinar_s_code' => trim($_POST['l_second_examinar_s_code']),
                    'l_is_exam_supervisor' => isset($_POST['l_is_exam_supervisor']) ? '1' : '0',
                    
                    'l_nameError' => '',
                ];

                if(empty($data['l_name'])){
                    $data['l_nameError'] = 'Please enter Lecturer Name';
                }

                if(empty($data['l_nameError'])){
                    if($this->L_postModel->createLecturer($data)){
                        //flash('post_message', 'Lecturer Added');
                        //redirect('pages/administrator_dashboard');
                        redirect('AdminPosts/viewLecturers');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    $this->view('posts/v_createLecturer', $data);

                }
            }  else{
                $data = [

                    'title' => 'Create Lecturer',

                    'l_name' => '',
                    'l_email' => '',
                    'l_sub1_code' => '',
                    'l_sub2_code' => '',
                    'l_sub3_code' => '',
                    'l_exp1_code' => '',
                    'l_exp2_code' => '',
                    'l_exp3_code' => '',
                    'l_second_examinar_s_code' => '',
                    'l_is_exam_supervisor' => '',
                    
                    'l_nameError' => '',
                ];
                $this->view('AdminPosts/v_createLecturer', $data);
            }  
        }

        //show all lecturers
        public function viewLecturers(){
            $posts = $this->L_postModel->getLecturers();
            $data = [
                'title' => 'View Lecturers',
                'posts' => $posts
            ];
            $this->view('AdminPosts/v_viewLecturers', $data);
        }

        public function updateLecturer($postId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [

                    'title' => 'Update Lecturer',
                    'postId' => $postId,

                    'l_id' => trim($_POST['l_id']), //added
                    'l_name' => trim($_POST['l_name']),
                    'l_email' => trim($_POST['l_email']),
                    'l_sub1_code' => trim($_POST['l_sub1_code']),
                    'l_sub2_code' => trim($_POST['l_sub2_code']),
                    'l_sub3_code' => trim($_POST['l_sub3_code']),
                    'l_exp1_code' => trim($_POST['l_exp1_code']),
                    'l_exp2_code' => trim($_POST['l_exp2_code']),
                    'l_exp3_code' => trim($_POST['l_exp3_code']),
                    'l_second_examinar_s_code' => trim($_POST['l_second_examinar_s_code']),
                    'l_is_exam_supervisor' => isset($_POST['l_is_exam_supervisor']) ? '1' : '0',
                    
                ];

                if(1){
                    if($this->L_postModel->updateLecturer($data)){
                        redirect('AdminPosts/viewLecturers');
                    }else{
                        die('Something went wrong');
                    }
                }
            }else{
                $post = $this->L_postModel->getLecturerById($postId);
                $data = [
                    'title' => 'Update Lecturer',

                    'l_id' => $post->l_id, //added
                    'l_name' => $post->l_name,
                    'l_email' => $post->l_email,
                    'l_sub1_code' => $post->l_sub1_code,
                    'l_sub2_code' => $post->l_sub2_code,
                    'l_sub3_code' => $post->l_sub3_code,
                    'l_exp1_code' => $post->l_exp1_code,
                    'l_exp2_code' => $post->l_exp2_code,
                    'l_exp3_code' => $post->l_exp3_code,
                    'l_second_examinar_s_code' => $post->l_second_examinar_s_code,
                    'l_is_exam_supervisor' => $post->l_is_exam_supervisor,
                ];
                $this->view('AdminPosts/v_updateLecturer', $data);
            }
        }

        public function deleteLecturer($postId){
            if($this->L_postModel->deleteLecturer($postId)){
                redirect('AdminPosts/viewLecturers');
            }else{
                die('Something went wrong');
            }
        }

    }

