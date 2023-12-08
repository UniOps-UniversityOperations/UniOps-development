<!-- this variable is used to set the css file for this view -->
<?php $style = "viewRooms"; ?> 

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>




<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- <div class="wrapper side-panel-open"> -->
        <div class="wrapper">
        <div class="main">
            <h1 class="topic">Adminitsrator / Rooms</h1>

            <?php
                // Count the number of rooms for each type
                $roomTypes = [];
                foreach ($data['posts'] as $post) {
                    $type = $post->type;
                    if (!isset($roomTypes[$type])) {
                        $roomTypes[$type] = 1;
                    } else {
                        $roomTypes[$type]++;
                    }
                }
                ?>

                <div class="centered_container">
                    <div class="room_type_counts">
                        <?php
                        // Display the count for each type
                        foreach ($roomTypes as $type => $count) {
                            echo "<div class='count_tile'>";
                            echo "<div class='count_row'>";
                            echo "<div class='count_column'><p>Number of \"$type rooms\":</p></div>";
                            echo "<div class='count_column'><p>$count</p></div>";
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>

                <div class="table-head">
                    <div class="search-container">
                        <input type="text" id="search" placeholder="Search by room name..." >
                        <span class="clear-icon" id="clear-search">&#10006;</span>
                    </div>
        
                    <div class="create_room_button">
                        <a href="<?php echo URLROOT;?>/AdminPosts/createRoom">
                            <button class="create_button">Create Room</button>
                        </a>
                    </div>
                </div>

                <style>
                    .table-head{
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin: 20px
                    }
                </style>


            <?php $test = $lec_room = []; ?>

            <?php foreach($data['posts'] as $post) : ?>

                <div class="lecture_room" data-room-name="<?php echo $post->name; ?>">

                    <!-- Idle view -->
                    <div class="idle-view">
                            <div class="lecture_room_header">
                                <h3 class="header_title"><?php echo $post->name; ?> (<?php echo $post->type; ?> room)</h3>
                                <p class="header_item"><b>ID / Code:</b> <?php echo $post->id; ?></p>
                                <p class="header_item"><b>Type:</b> <?php echo $post->type; ?></p>
                                <p class="header_item"><b>Capacity:</b> <?php echo $post->capacity; ?></p>
                                <p class="header_item"><b>Availability:</b> <?php echo $post->current_availability; ?></p>
                                
                                <div class="action_buttons">
                                <button class="view_button">View</button>
                                    <a href="<?php echo URLROOT; ?>/AdminPosts/updateRoom/<?php echo $post->id ?>"><button class="update_button">Update</button></a>
                                    <a href="<?php echo URLROOT; ?>/AdminPosts/deleteRoom/<?php echo $post->id ?>"><button class="delete_button">Delete</button></a>
                                </div>
                            </div>  
                    </div>
                    
                    <!-- Detailed view -->

                            <?php
                            // $test.push($post->name);
                             $test[] = $post->name;
                             $lec_room[] = $post;
                            ?>
                    
                    
                </div>
                
            <?php endforeach; ?>


        </div>
        <button class="side-panel-toggle" type="button">
            <span class="material-icons sp-icon-open">keyboard_double_arrow_left</span>
            <span class="material-icons sp-icon-close">keyboard_double_arrow_right</span>
        </button>

        <div class="side-panel">
            <?php

                foreach ($lec_room as $post) {
                    echo "<div class='side_item'>";
                    ?>

                        <div class="sidebar_header">
                            <h3 class="header_text"><?php echo $post->name; ?></h3>
                        
                        </div>

                        <div class="sidebar_body_top">
                            <div class="sidebar_top_left">
                                <p><b>ID / Code</b></p> 
                                <p><b>Type</b></p>
                                <p><b>Capacity</b></p>
                                <p><b>Availability</b></p> 
                                <p><b>No of Tables</b></p> 
                                <p><b>No of Chairs</b></p> 
                                <p><b>No of Boards</b></p> 
                                <p><b>No of Projectors</b></p>
                                <p><b>No of Computers</b></p>
                            </div>

                            <div class="sidebar_top_right">
                                <p> <b> : </b> <?php echo $post->id; ?></p>
                                <p> <b> : </b> <?php echo $post->type; ?></p>
                                <p> <b> : </b> <?php echo $post->capacity; ?></p>
                                <p> <b> : </b> <?php echo $post->current_availability; ?></p>
                                <p> <b> : </b> <?php echo $post->no_of_tables; ?></p>
                                <p> <b> : </b> <?php echo $post->no_of_chairs; ?></p>
                                <p> <b> : </b> <?php echo $post->no_of_boards; ?></p>
                                <p> <b> : </b> <?php echo $post->no_of_projectors; ?></p>
                                <p> <b> : </b> <?php echo $post->no_of_computers; ?></p>
                            </div>

                            
                        </div>

                        <div class="sidebar_body_bottom">
                            <p>Is AC: <?php echo $post->is_ac; ?></p>
                            <p>Is Wifi: <?php echo $post->is_wifi; ?></p>
                            <p>Is Media: <?php echo $post->is_media; ?></p>
                            <p>Is Lecture: <?php echo $post->is_lecture; ?></p>
                            <p>Is Lab: <?php echo $post->is_lab; ?></p>
                            <p>Is Tutorial: <?php echo $post->is_tutorial; ?></p>
                            <p>Is Meeting: <?php echo $post->is_meeting; ?></p>
                            <p>Is Seminar: <?php echo $post->is_seminar; ?></p>
                            <p>Is Exam: <?php echo $post->is_exam; ?></p>
                        </div>
                    <?php
                    echo "</div>";
                }

            ?>

        </div>
    
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="<?php echo URLROOT;?>/js/administrator/viewRooms.js"></script>
<script>
    $(document).ready(function(){
        $(".lecture_room .view_button").click(function(){
            
            // get the index of the lecture_room div
            var index = $(".lecture_room .view_button").index(this);
            console.log(index);

            // toggle display block on index of side_item

            $(".side_item").removeClass("active");
            $(".side_item").eq(index).toggleClass("active");

        });
        

        // onclick .delete_button prevent default and confirm
        $(".delete_button").click(function(e){
            e.preventDefault();
            var c = confirm("Are you sure you want to delete this room?");
            if(c){
                // get href from parent div
                var href = $(this).parent().attr("href");
                console.log(href);
                // follow the href
                window.location.href = href;
                
            }
        });
    });
</script>



<?php require APPROOT . '/views/includes/adminFooter.php'; ?>