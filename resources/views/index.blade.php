<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sample App</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <form action="/" method="post">
            {{ csrf_field() }}
        	<div class="form-group">
             <label for="name">Product Name</label>
            <input type="text" name="name" id="" class="form-control">   
            </div>
        	
        	<button class="btn btn-success">Submit</button>
        </form>

        <table class="table table-hover my-5">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Expiration Date</th>
    </tr>
  </thead>
  <tbody>

  @foreach($products as $product)

    <tr data-id={{$product->id}}>
        <td>{{$product->name}}</td>
        <td>{{$product->expiration_date->toFormattedDateString()}}</td>
    </tr>
    
  @endforeach
  </tbody>
</table>
     
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <script>
            $(function() {
                $.ajax({
                    url: 'http://127.0.0.1:8000/fetch',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        '_token': $('[name=_token]').val()
                    },
                    success: function(datas){
                        console.log(datas);
                       $.each(datas, function(index,val){

                            console.log(val.status);
                            if (val.status == 'expired') {
                                $('[data-id=' + val.id + ']').addClass('table-danger');
                            }

                            if (val.status == 'warning') {
                                $('[data-id=' + val.id + ']').addClass('table-warning');
                            }
                           
                       });
                    }
                })
            });
        </script>
    </body>
</html>