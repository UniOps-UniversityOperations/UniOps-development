<?php $style = "createSubject"; ?>

<?php require APPROOT . '/views/includes/adminHeader.php'; ?>

<h1>Add New Subject</h1><br>

<div class="content">
    <form action="<?php echo URLROOT;?>/adminPosts/createSubject" method="post">

    <fieldset>
        <!-- input feilds -->

        <label class="lable" for="sub_code">Code:
        <input type="text" id="sub_code" name="sub_code" placeholder="sub_code" value="<?php $data["sub_code"];?>" oninput="this.value = this.value.toUpperCase();" required>
        </label>

        <label class="lable" for="sub_name">Name:
        <input type="text" id="sub_name" name="sub_name" placeholder="sub_name" value="<?php $data["sub_name"];?>" oninput="this.value = this.value.toUpperCase();" required>
        </label>

        <label class="label" for="credit_type">Credit:
            <select id="sub_credits" name="sub_credits" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </label>


        <label class="lable" for="sub_year">Year:
            <select id="sub_year" name="sub_year" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </label>

        <label class="lable" for="sub_semester">Semester:
            <select id="sub_semester" name="sub_semester" required>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </label>

        <label class="lable" for="sub_stream">Stream:
            <select id="sub_stream" name="sub_stream" required>
                <option value="CS">CS</option>
                <option value="IS">IS</option>
            </select>
        </label>

        <label class="label" for="sub_nStudents">Number of Students:
        <input type="number" id="sub_nStudents" name="sub_nStudents" placeholder="Type or select" value="<?php echo $data["sub_nStudents"]; ?>" >

        <!-- Pre-defined values as clickable labels in two rows -->
        <div class="button-container">
            <label for="btn10" onclick="setNumberOfStudents(10)">10 Students</label>
            <label for="btn20" onclick="setNumberOfStudents(20)">20 Students</label>
            <label for="btn30" onclick="setNumberOfStudents(30)">30 Students</label>
            <label for="btn40" onclick="setNumberOfStudents(40)">40 Students</label>
        </div>
        <div class="button-container">
            <label for="btn50" onclick="setNumberOfStudents(50)">50 Students</label>
            <label for="btn60" onclick="setNumberOfStudents(60)">60 Students</label>
            <label for="btn70" onclick="setNumberOfStudents(70)">70 Students</label>
            <label for="btn80" onclick="setNumberOfStudents(80)">80 Students</label>
        </div>
        </label>

        <script>
            // Function to set the number of students when a label is clicked
            function setNumberOfStudents(value) {
                document.getElementById('sub_nStudents').value = value;
            }
        </script>
                
    </fieldset>
        <!-- Checkeck boxes -->

        <fieldset>

        <label>
        <input type="checkbox" class="inline"  id="is_ac" name="sub_isCore" value="true">
        Is a Core Subject</label>

        <label>
        <input type="checkbox" class="inline"  id="is_al" name="sub_isHaveLecture" value="true">
        Has a Lecture</label>

        <label>
        <input type="checkbox" class="inline"  id="is_al" name="sub_isHaveTutorial" value="true">
        Has a Tutorial</label>

        <label>
        <input type="checkbox" class="inline"  id="is_al" name="sub_isHavePractical" value="true">
        Has a Practical</label>
        
        </fieldset>

        <button type="submit" class="create_button">Create Room</button>
    </form>
</div>



    <!-- Footer Section -->
    <?php require APPROOT . '/views/includes/adminFooter.php'; ?>


    <!-- Structure of the database table:
        sub_id
        sub_code
        sub_name
        sub_credits
        sub_year
        sub_semester
        sub_stream
        sub_nStudents
        sub_isCore
        sub_isHaveLecture
        sub_isHaveTutorial
        sub_isHavePractical
        sub_isDeleted -->