<?php $style = "lecturecss/viewRooms"; 
$data_json = json_encode($data);
?> 

<?php require APPROOT . '/views/includes/LecturerHeader.php'; ?>

<div class="sidebar"  id="room">
    <div class="sidebar-content">
        <h2 id="roomIdHeader">Room Details </h2>
        <p class = "item-title">Number of Boards <span class = "item-value" id="boards"></span></p>
        <p class = "item-title">Number of Computers <span class = "item-value" id="computers"></span></p>
        <p class = "item-title">Number of Projectors <span class = "item-value" id="projectors"></span> </p>
        <p class = "item-title">AC <span class = "item-value" id="AC"></span></p>
        <p class = "item-title">WIFI <span class = "item-value" id="WI-FI"></span></p>   
        <p class = "item-title">Media <span class = "item-value" id="media"></span></p>
        <p class = "item-title">Lecture <span class = "item-value" id="lecture"></span></p>
        <p class = "item-title">Lab <span class = "item-value" id="lab"></span></p>
        <p class = "item-title">Tutorial <span class = "item-value" id="tutorial"></span></p>
        <p class = "item-title">Meeting <span class = "item-value" id="meeting"></span></p>
        <p class = "item-title">Seminar <span class = "item-value" id="seminar"></span></p>
        <p class = "item-title">Exam <span class = "item-value" id="exam"></span></p>
    </div>

    <button class = "view" id="view">Allocate</button>

</div>

<h1>View Rooms</h1>

<div class="content">

    <div class="search-bar">
        <input type="text" placeholder="Search by Room Name..." onkeyup="searchRooms()" id = "searchInput">
        <span id="clear-search">&#10006;</span>
        <label for="filter">Filter By Type</label>
        <select name="type" id="filter">
            <option value="All">All</option>
            <option value="LECTURE">LECTURE</option>
            <option value="LAB">LAB</option>
            <option value="MEETING">MEETING</option>
            <option value="COMMON">COMMON</option>
            <option value="OTHER">OTHER</option>
        </select>
    </div>

    <div class="tabs-section">
        <div id="tab">Booking Grid </div>
    </div>

</div>

<div class="rooms">

    <table class="styled-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Capacity</th>
                <th>No_Of_Tables</th>
                <th>No_Of_Chairs</th>
            </tr>
        </thead>
        <tbody id="tbody" data="<?php echo htmlspecialchars($data_json, ENT_QUOTES, 'UTF-8'); ?>">

            <?php
            foreach ($data as $row) {
                echo '<tr id="'.$row->name.'">';
                echo '<td class = "id">'.$row->name.'</td>';
                echo '<td>'.$row->type.'</td>';
                echo '<td>'.$row->capacity.'</td>';
                echo '<td>'.$row->no_of_tables.'</td>';
                echo '<td>'.$row->no_of_chairs.'</td>';
                echo '</tr>';
            } ?>
        </tbody>
    </table>

</div>

</div>

<script src="<?php echo URLROOT;?>/js/lecturerjs/viewRooms.js"></script>


<?php require APPROOT . '/views/includes/LecturerFooter.php'; ?>
