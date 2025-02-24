<!DOCTYPE html>
<html lang="en">
<header>
    @include('navigation')
</header>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Questions</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}">
</head>
<style>
    
</style>
<body>
    <h2>Upload Question</h2>

    <div class="container mt-5">
        <div class="row">
            <!-- Upload Section -->
            <div class="col-md-8">
                <div class="card p-4 shadow-sm">
                    <h4 class="mb-3">Upload Questions for AI Leveling</h4>
                    <div class="upload-box border rounded p-4 text-center">
                        <input type="file" id="questionFile" class="d-none">
                        <label for="questionFile" class="btn btn-outline-primary">
                            <i class="fas fa-upload"></i> Choose File
                        </label>
                        <p class="text-muted mt-2">Drag & Drop your question file here</p>
                    </div>
                    <button class="btn btn-success mt-3 w-100">Process with AI</button>
                </div>

                <!-- AI Categorized Questions -->
                <div class="card p-4 shadow-sm mt-4">
                    <h4 class="mb-3">AI Categorized Questions</h4>
                    <div class="row">
                        <!-- Easy -->
                        <div class="col-md-4">
                            <div class="p-3 rounded text-dark" style="background-color: #d9f7be;">
                                <h6 class="fw-bold">Easy</h6>
                                <ul class="list-unstyled">
                                    <li>What is the primary function of SwiftUI?</li>
                                    <li>Explain the use of Xcode in iOS development.</li>
                                    <li>Describe the basics of UIKit.</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Moderate -->
                        <div class="col-md-4">
                            <div class="p-3 rounded text-dark" style="background-color: #bae7ff;">
                                <h6 class="fw-bold">Moderate</h6>
                                <ul class="list-unstyled">
                                    <li>How does memory management work in iOS apps?</li>
                                    <li>What are key features of Swift?</li>
                                    <li>Discuss the importance of MVC architecture.</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Difficult -->
                        <div class="col-md-4">
                            <div class="p-3 rounded text-dark" style="background-color: #ffd6e7;">
                                <h6 class="fw-bold">Difficult</h6>
                                <ul class="list-unstyled">
                                    <li>Analyze the impact of Core Data on app performance.</li>
                                    <li>Compare and contrast different async patterns in Swift.</li>
                                    <li>Elaborate on security measures in iOS app development.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-warning mt-3">Modify Question</button>
                </div>
            </div>

            <!-- Selected Course -->
            <div class="col-md-4">
                <div class="card p-4 shadow-sm">
                    <h4 class="mb-3">Selected Course</h4>
                    <p><strong>Course:</strong> iOS App Development</p>
                    <p><strong>Chapter:</strong> Chapter 1: Basic of Concepts</p>
                    <p><strong>Part:</strong> Understanding the Basics</p>
                </div>

                <!-- Action Buttons -->
                <button class="btn btn-success mt-3 w-100">Upload Question</button>
                <button class="btn btn-danger mt-2 w-100">Cancel</button>
            </div>
        </div>
    </div>
</body>
</html>
