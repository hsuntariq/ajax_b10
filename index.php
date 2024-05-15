<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>AJAX</title>
</head>
<body>
    

    <div class="container col-lg-5 mx-auto shadow p-4 rounded">

            <form>
                <input type="text" placeholder="name" class='my-2 form-control' id="name">
                <p class="text-danger m-0 p-0 fw-bolder err"></p>
                <input type="number" placeholder="age" class='my-2 form-control' id="age">
                <input type="text" placeholder="class" class='my-2 form-control' id="class">
                <button class="btn btn-dark w-100 my-2">
                    Add Data
                </button>
            </form>
        </div>
    <input type="search"   class='w-25 mx-auto form-control search my-2' placeholder='Search...'>
    <table class='table container mx-auto text-center mt-4 text-capitalize table-striped table-dark'>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>age</th>
                <th>class</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    // showing the data
    function getData(){
        $(document).ready(function(){
            $.ajax({
                url:'./get-data.php',
                type:'GET',
                data:{},
                success:function(res){
                    $('tbody').html(res)
                },
                error:function(err){
                    console.error(err)
                }
            })
        })
    }

    getData()

    $('.btn-dark').on('click',function(e){
        e.preventDefault()

        let name = $('#name');
        let age = $('#age');
        let cls = $('#class');
        if(name.val() == ''){
            $('.err').html('PLease enter this field')
        }
        // console.log(name.val(),age.val(),cls.val())
        $.ajax({
            url:'./add-data.php',
            type:'POST',
            data:{
                name:name.val(),age:age.val(),class:cls.val()
            },
            success:function(response){
                getData()
                name.val('')
                age.val('')
                cls.val('')
            }
        })
    })


    $('.search').on('keyup',function(){
        let find = $('.search').val()
        $.ajax({
            url:'./search.php',
            type:'POST',
            data:{
                search:find
            },
            success:function(response){
                $('tbody').html(response)
            }
        })
    })


</script>


</body>
</html>