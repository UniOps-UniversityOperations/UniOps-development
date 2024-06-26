<?php $style = "createStudent"; ?>

<?php require APPROOT . '/views/includes/admin/adminHeader.php'; ?>

<h1>Update Student</h1>

<div class="content">
    <form action="<?php echo URLROOT;?>/AdminPosts/updateStudent/<?php echo $data["s_id"];?>" method="POST">

    <fieldset>
        <label class="lable" for="s_id">Student ID:
        <input type="text" id="s_id" name="s_id" placeholder="s_id" value="<?php echo $data["s_id"];?>" required>
        </label>

        <label class="lable" for="s_code">Student Code:
        <input type="text" id="s_code" name="s_code" placeholder="s_code" value="<?php echo $data["s_code"];?>" required>
        </label>

        <label class="lable" for="s_email">Student Email:
        <input type="email" id="s_email" name="s_email" placeholder="s_email" value="<?php echo $data["s_email"];?>" required>
        </label>

        <label class="lable" for="s_fullName">Student Full Name:
        <input type="text" id="s_fullName" name="s_fullName" placeholder="s_fullName" value="<?php echo $data["s_fullName"];?>" required>
        </label>

        <label class="lable" for="s_nameWithInitial">Student Name With Initials:
        <input type="text" id="s_nameWithInitial" name="s_nameWithInitial" placeholder="s_nameWithInitial" value="<?php echo $data["s_nameWithInitial"];?>" required>
        </label>

        <label class="lable" for="s_stream">Subject Stream: 
            <select id ="s_stream" name="s_stream" required>
                <option value="CS" <?php echo ($data["s_stream"]== 'cs') ? 'selected' : ''; ?>>CS</option>
                <option value="IS" <?php echo ($data["s_stream"]== 'is') ? 'selected' : ''; ?>>IS</option>
            </select>    
        </label>

        <!-- <label class="lable" for="s_regNumber">Student Registration Number:
        <input type="text" id="s_regNumber" name="s_regNumber" placeholder="s_regNumber" value="<?php echo $data["s_regNumber"];?>" required>
        </label> -->

        <label class="label" for="s_regNumber">Student Registration Number:
        <input type="text" id="s_regNumber" name="s_regNumber" placeholder="s_regNumber" value="<?php echo $data["s_regNumber"];?>" required pattern="^(\d{4})/(\w+)/(\d{3})$" title="Format: 4 digits/s_stream/3 digits">
        </label>

        <label class="lable" for="s_indexNumber">Student Index Number:
        <input type="text" id="s_indexNumber" name="s_indexNumber" placeholder="s_indexNumber" value="<?php echo $data["s_indexNumber"];?>" required>
        </label>

        <label class="lable" for="s_dob">Student Date Of Birth:
        <input type="date" id="s_dob" name="s_dob" placeholder="s_dob" value="<?php echo $data["s_dob"];?>" required>
        </label>

        <!-- <label class="lable" for="s_contactNumber">Student Contact Number:
        <input type="text" id="s_contactNumber" name="s_contactNumber" placeholder="s_contactNumber" value="<?php echo $data["s_contactNumber"];?>" required>
        </label> -->
        <label class="lable" for="s_contactNumber">Student Contact Number:
        <input type="text" id="s_contactNumber" name="s_contactNumber" placeholder="s_contactNumber" 
           value="<?php echo $data["s_contactNumber"];?>" 
           pattern="[0-9]{10}" 
           title="Please enter a 10-digit contact number" 
           required>
        </label>

        <label class="lable" for="s_year">Year:
            <select id="s_year" name="s_year" required>
                <option value=1 <?php echo ($data["s_year"] == '1') ? 'selected' : ''; ?>>1</option>
                <option value=2 <?php echo ($data["s_year"] == '2') ? 'selected' : ''; ?>>2</option>
                <option value=3 <?php echo ($data["s_year"] == '3') ? 'selected' : ''; ?>>3</option>
                <option value=4 <?php echo ($data["s_year"] == '4') ? 'selected' : ''; ?>>4</option>
            </select>
        </label>

        <!-- <label class="lable" for="s_semester">Semester:
        <input type="text" id="s_semester" name="s_semester" placeholder="s_semester" value="<?php echo $data["s_semester"];?>" required>
        </label> -->

    </fieldset>

    <button type="submit" class="create_button">UPDATE</button>

    </form>
</div>

<!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>

