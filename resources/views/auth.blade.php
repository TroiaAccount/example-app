<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
    header {
        position: absolute;
        width: 100%;
        height: 50px;
        background-color: #007bff;
        display: flex;
        justify-content: space-between;
    }

    .header_div {
        margin: auto 20px;

    }

    .form_class {
        position: relative;
        top: 60px;
    }

    .header_a {
        color: white;
    }
</style>

<body>
    <header>
        <div class="header_div">Logo</div>
        <div class="header_div">
            <a class="header_a" href="{{Route('authPage')}}">Auth</a>
            <a class="header_a" href="{{Route('registerPage')}}">Register</a>
        </div>
    </header>
    <form class="form_class" id="auth">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

<script>
    $("#auth").on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url: '{{Route("Auth")}}',
            method: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(data){
                if(data.status == true){
                    location = "{{Route('showPage')}}"
                }
            }
        });
    });
</script>

</html>
