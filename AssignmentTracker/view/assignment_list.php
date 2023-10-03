<?php
include('header.php'); ?>

<section id="list" class="list">
    <header class="list__row list__header">
        <h1>Assignments</h1>
        <form action="." method="get" id="list__header_select" class="list__header_select">
            <input type="hidden" name="action" value="list_assignments">
            <select name="course_id" required>
                <option value="0">View All </option>
                <!-- Going through all the courses -->
                <?php foreach ($courses as $course) : ?>
                    <?php if ($course_id == $course['course_id']) { ?>
                        <option value="<?= $course["course_id"] ?>" selected>

                        <?php } else { ?>
                        <option value="<?= $course["course_id"] ?>">

                        <?php } ?>
                        <?= $course["course_name"] ?>
                        </option>
                    <?php endforeach; ?>
            </select>
            <!-- Each button can activate the processing of this form -->
            <button class="add-button bold">Go</button>
        </form>
    </header>
    <!-- Going through all the assignments -->
    <?php if (isset($assignments) && $assignments) { ?>

        <?php foreach ($assignments as $assignment) : ?>

            <div class="list__row">
                <div class="list__item">
                    <p class="bold">
                        <?= $assignment["course_name"] ?>
                    </p>
                    <hr>
                    <p><?= $assignment["description"] ?></p>
                </div>

                <div class="list__remove_item">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_assignment">
                        <input type="hidden" name="assignment_id" value="<?= $assignment["id"]; ?>">
                        <button class="remove-button">❌</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } else { ?>
        <br>
        <?php if (isset($course_id) && $course_id) { ?>
            <p>No assignments exist for this course yet.</p>
        <?php } else { ?>
            <p>No assignments exist yet.</p>
        <?php } ?>
        <br>
    <?php } ?>

</section>
<section id="add" class="add">
    <h2>Add Assignment</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_assignment">
        <div class="add__inputs">
            <label>Course:</label>
            <select name="course_id" required>
                <option value="">Please select value</option>
                <?php foreach ($courses as $course) : ?>
                    <option value="<?= $course["course_id"]; ?>">
                        <?= $course["course_name"]; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="">Description</label>
            <input type="text" name="description" placeholder="The description of your assignment :)" required maxlength="255">
        </div>
        <div class="add__addItem">
            <button class="add-btn bold">Add</button>
        </div>
    </form>
</section>
<br>
<p><a href=".?action=list_courses">View/Edit Courses</a></p>
<?php
include('footer.php');
?>