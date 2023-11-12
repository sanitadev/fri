<?php

function isFakeReview($text) {
    // Check if the review has too many uppercase letters
    $uppercaseCount = preg_match_all('/[A-Z]/', $text);
    $totalChars = strlen($text);
    $uppercaseRatio = $uppercaseCount / $totalChars;

    // Check if the review has excessive exclamation marks
    $exclamationCount = substr_count($text, '!');
    
    // Set the thresholds based on your analysis
    $uppercaseThreshold = 0.20; // Adjust this based on your data
    $exclamationThreshold = 3; // Adjust this based on your data

    // Return true if the review meets the criteria for being fake
    return $uppercaseRatio > $uppercaseThreshold || $exclamationCount > $exclamationThreshold;
}

// Example usage
$reviewText = "This product is AMAZING!!! I LOVE IT!!!";
if (isFakeReview($reviewText)) {
    echo "Potential fake review detected!";
} else {
    echo "Review seems genuine.";
}
?>
