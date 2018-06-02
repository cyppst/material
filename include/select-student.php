<select class="form-control" id="student_id" name="student_id">
    <option value="">ไม่ระบุ / เบิกเอง</option>
    <?php
    $students = ORM::for_table('student')->find_many();
    foreach ($students as $student) : ?>
        <option value="<?= (int)$student['id'] ?>"><?= (string)$student['full_name'] ?></option>
    <?php endforeach; ?>
</select>