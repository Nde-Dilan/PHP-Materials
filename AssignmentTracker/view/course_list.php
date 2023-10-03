<?php include('header.php');?>

<?php if($courses) {?>
    <section id="list" class="list">
        <header class="list__row list__row">
            <h1>Course List</h1>

        </header>
        <?php foreach($courses as $course): ?>
            <div class="list__row">
                <div class="list__item">
                    <p class="bold"><?= $course["course_name"]?></p>
                </div>
                <div class="list__removeItem">
                    <form action="." method="post"> 
                        <input type="hidden" name="action" value="delete_course">
                        <input type="hidden" name="course_id" value="<?= $course["course_id"]?>">
                        <button class="remove-button">❌</button>
                    </form>
                </div>
            </div>
        <?php endforeach;?>
    </section>

<?php }else{?>
    <p>No course exist yet.</p>
<?php }?>
<section id="add" class="add">
    <h2>Add Course</h2>
    <form id="add__form" class="add__form" action="." method="post">
        <input type="hidden" name="action" value="add_course">
        <div class="add__inputs"><label for="">Name</label><input type="text" name="course_name" placeholder="The nameof the course you want to add" autofocus required maxlength="255">
        <label for="">Description</label><input type="text" name="course_description" placeholder="The description of the course you want to add" required maxlength="255"></div>
        <div class="add__addItem"><button class="add-button bold">Add</button></div>
    </form>
</section>
<br>
<p><a href=".">View &amp; Add assignments</a></p>
<?php include('footer.php');?>