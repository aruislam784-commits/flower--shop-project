<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ফর্ম থেকে ডেটা সংগ্রহ
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];
    
    // যে টেক্সট ফাইলটিতে মেসেজ সেভ হবে তার নাম
    $file = 'messages.txt';
    
    // মেসেজের ফরম্যাট
    $data = "Name: " . $name . "\n" .
            "Email: " . $email . "\n" .
            "Number: " . $number . "\n" .
            "Message: " . $message . "\n" .
            "Date: " . date('Y-m-d H:i:s') . "\n" .
            "-----------------------------\n";
            
    // ফাইলটিতে ডেটা যোগ করা
    // FILE_APPEND ফ্ল্যাগ নতুন ডেটা ফাইলের শেষে যোগ করে
    // LOCK_EX ফ্ল্যাগ একই সময়ে একাধিক লেখার চেষ্টা থেকে রক্ষা করে
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        echo "আপনার মেসেজ সফলভাবে সংরক্ষণ করা হয়েছে।";
    } else {
        echo "মেসেজ সংরক্ষণে একটি সমস্যা হয়েছে।";
    }
} else {
    // যদি ফর্মটি সরাসরি সাবমিট না করা হয়, তবে কন্টাক্ট পেজে ফিরিয়ে নেওয়া
    header("Location: index.html#contact");
}
?>