<?php
$score = rand(0, 100);
echo "スコア: $score\n";
?>

<?php if ($score >= 80): ?>
    優
<?php elseif ($score >= 60): ?>
    良
<?php else: ?>
    可
<?php endif; ?>