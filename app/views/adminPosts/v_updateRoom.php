<!-- this variable is used to set the css file for this view -->
<?php $style = "createRoom"; ?>

<?php require APPROOT . '/views/includes/admin/adminHeader.php'; ?>


<?php if($data['popup']){ ?>
    
    <div id="popup" 
        style="
        display: none; 
        position: fixed; 
        border-radius: 10px;
        font-size: 19px;
        font-weight: bold;
        color: red;
        top: 10%; 
        left: 78%; 
        transform: 
        translate(50%, -25%); 
        background-color: white; 
        padding: 20px 20px 20px 20px;
        margin-right: 20px;
        border: 1px red solid; 
        transition: top 0.5s ease;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
        <!-- if popup = 1 Request Email Sent | if popup = 2 Status Email Sent -->
        <p>Room ID already exists! </p>
        
    </div>
    
    <script>
        // Function to show the popup message
        function showPopup() {
            var popup = document.getElementById('popup');
            popup.style.display = 'block';
    
            // Hide the popup after 5 seconds
            setTimeout(function() {
                popup.style.display = 'none';
            }, 3000);
        }
    
        // Call the showPopup function when the page loads
        window.onload = showPopup;
    </script>
    
    <?php } ?>


<div class="content">
    <h1>Update Lecture Room Information</h1>
    <form action="<?php echo URLROOT;?>/AdminPosts/updateRoom/<?php echo $data['id'];?>" method="POST">

        <!-- input feilds -->
        <fieldset>

        <label class="lable" for="name">Name / Code: :
        <input type="text" id="name" name="name" placeholder="name" value="<?php echo strtoupper($data["name"]); ?>" oninput="this.value = this.value.toUpperCase();" required>
        </label>

        <label class="lable" for="type">Type:
        <select id="type" name="type" required>
            <option value="LECTURE" <?php echo ($data["type"] == 'LECTURE') ? 'selected' : ''; ?>>LECTURE</option>
            <option value="LAB" <?php echo ($data["type"] == 'LAB') ? 'selected' : ''; ?>>LAB</option>
            <option value="MEETING" <?php echo ($data["type"] == 'MEETING') ? 'selected' : ''; ?>>MEETING</option>
            <option value="COMMON" <?php echo ($data["type"] == 'COMMON') ? 'selected' : ''; ?>>COMMON</option>
            <option value="OTHER" <?php echo ($data["type"] == 'OTHER') ? 'selected' : ''; ?>>OTHER</option>
        </select>
        </label>

        <label class="lable" for="capacity">Capacity:
        <input type="text" id="capacity" name="capacity" placeholder="capacity" value="<?php echo $data["capacity"];?>" required>
        </label>

        <label class="lable" for="current_availability">Current Availability:
        <input type="text" id="current_availability" name="current_availability" placeholder="current_availability" value="<?php echo $data["current_availability"];?>" required>
        </label>

        <label class="lable" for="no_of_tables">Number of Tables:
        <input type="number" id="no_of_tables" name="no_of_tables" placeholder="no_of_tables" value="<?php echo $data["no_of_tables"];?>" required>
        </label>

        <label class="lable" for="no_of_chairs">Number of Chairs:
        <input type="number" id="no_of_chairs" name="no_of_chairs" placeholder="no_of_chairs" value="<?php echo $data["no_of_chairs"];?>" required>
        </label>

        <label class="lable" for="no_of_boards">Number of Boards:
        <input type="number" id="no_of_boards" name="no_of_boards" placeholder="no_of_boards" value="<?php echo $data["no_of_boards"];?>" required>
        </label>

        <label class="lable" for="no_of_projectors">Number of Projectors:
        <input type="number" id="no_of_projectors" name="no_of_projectors" placeholder="no_of_projectors" value="<?php echo $data["no_of_projectors"];?>" required>
        </label>

        <label class="lable" for="no_of_computers">Number of Computers:
        <input type="number" id="no_of_computers" name="no_of_computers" placeholder="no_of_computers" value="<?php echo $data["no_of_computers"];?>" required>
        </label>

        </fieldset>

        <!-- Checkeck boxes -->

        <fieldset>
        <label>
        <input type="checkbox" class="inline" id="is_ac" name="is_ac" value="1" <?php echo $data["is_ac"] == 1 ? 'checked' : '';?>>
        A/C or Non A/C</label>

        <label>
        <input type="checkbox" class="inline" id="is_wifi" name="is_wifi" value="1" <?php echo $data["is_wifi"] == 1 ? 'checked' : '';?>>
        Wifi or Non Wifi</label>

        <label>
        <input type="checkbox" class="inline" id="is_media" name="is_media" value="1" <?php echo $data["is_media"] == 1 ? 'checked' : '';?>>
        Media or Non Media</label>

        <label>
        <input type="checkbox" class="inline" id="is_lecture" name="is_lecture" value="1" <?php echo $data["is_lecture"] == 1 ? 'checked' : '';?>>
        Is available for Lecture</label>

        <label>
        <input type="checkbox" class="inline" id="is_lab" name="is_lab" value="1" <?php echo $data["is_lab"] == 1 ? 'checked' : '';?>>
        Is available for Lab</label>

        <label>
        <input type="checkbox" class="inline" id="is_tutorial" name="is_tutorial" value="1" <?php echo $data["is_tutorial"] == 1 ? 'checked' : '';?>>
        Is available for Tutorial</label>

        <label>
        <input type="checkbox" class="inline" id="is_meeting" name="is_meeting" value="1" <?php echo $data["is_meeting"] == 1 ? 'checked' : '';?>>
        Is a Meeting</label>

        <label>
        <input type="checkbox" class="inline" id="is_seminar" name="is_seminar" value="1" <?php echo $data["is_seminar"] == 1 ? 'checked' : '';?>>
        Is available for Seminar</label>

        <label>
        <input type="checkbox" class="inline" id="is_exam" name="is_exam" value="1" <?php echo $data["is_exam"] == 1 ? 'checked' : '';?>>
        Is available for Exam</label>

        <button type="submit" class="create_button" >UPDATE</button>
        </fieldset>
    </form>
</div>

    <!-- Footer Section -->
<?php require APPROOT . '/views/includes/adminFooter.php'; ?>

