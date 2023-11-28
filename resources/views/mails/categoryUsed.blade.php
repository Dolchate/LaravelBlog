<!DOCTYPE html>
<html>
<head>
    <title>New Post Notification</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Post Notification</div>
                <div class="card-body">
                    <p>Hello {{ $user->name }},</p>
                    <p>Your category "{{ $category->name }}" has been used in a new post!</p>
                    <p>Thanks,</p>
                    <p>{{ config('app.name') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
