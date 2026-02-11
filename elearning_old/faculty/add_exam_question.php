<?php
// add_exam_question.php
// Form for faculty to add examination questions for a lesson
include '../admin/dbcon.php'; // adjust path as needed

$lesson_id = isset($_GET['lesson_id']) ? intval($_GET['lesson_id']) : 0;
$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lesson_id = intval($_POST['lesson_id']);
    $question_text = trim($_POST['question_text']);
    $option_a = trim($_POST['option_a']);
    $option_b = trim($_POST['option_b']);
    $option_c = trim($_POST['option_c']);
    $option_d = trim($_POST['option_d']);
    $correct_option = strtoupper(trim($_POST['correct_option']));

    if ($lesson_id && $question_text && $option_a && $option_b && $option_c && $option_d && in_array($correct_option, ['A','B','C','D'])) {
        $stmt = $conn->prepare("INSERT INTO examination_questions (lesson_id, question_text, option_a, option_b, option_c, option_d, correct_option) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('issssss', $lesson_id, $question_text, $option_a, $option_b, $option_c, $option_d, $correct_option);
        if ($stmt->execute()) {
            $success = true;
        } else {
            $error = 'Database error: ' . $stmt->error;
        }
        $stmt->close();
    } else {
        $error = 'Please fill all fields and select a valid correct option.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Examination Question</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h3>Add Examination Question</h3>
    <?php if ($success): ?>
        <div class="alert alert-success">Question added successfully!</div>
    <?php elseif ($error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="post">
        <input type="hidden" name="lesson_id" value="<?php echo htmlspecialchars($lesson_id); ?>">
        <div class="form-group">
            <label>Question</label>
            <textarea name="question_text" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Option A</label>
            <input type="text" name="option_a" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Option B</label>
            <input type="text" name="option_b" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Option C</label>
            <input type="text" name="option_c" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Option D</label>
            <input type="text" name="option_d" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Correct Option</label>
            <select name="correct_option" class="form-control" required>
                <option value="">Select</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Question</button>
    </form>
</div>
</body>
</html>
