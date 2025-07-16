<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap.css" rel="stylesheet">
</head>

<body class="bg-info">
    <div class="container ">
        <div class="row">
            <table class="table ">
            <thead class="">
                <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">ُEmail</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <th scope="row">1</th>
                    <td>Mohamed</td>
                    <td>Ayman</td>
                    <td>mo@g.com</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Momen</td>
                    <td>Ayman</td>
                    <td>mn@g.com</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Ayman </td>
                    <td>Saad</td>
                    <td>ay@g.com</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <div class=" container" >
        <div class="row w-50">
             <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            اضغط 
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"> اول مودل </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       <p>محمد ايمن طالب في كلية حاسبات ومعلومات</p>
                       <!-- <a href="www.linkedin.com/in/mohamed-ayman-3967ab324">my linkedin</a> --> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلق </button>
                        <button type="button" class="btn btn-primary">تم </button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center ">
        <div class="row ">
            <form class="row g-3 mt-5 ml-3">
        <div class="col-12">
            <label for="validationServer01" class="form-label">Full name</label>
            <input type="text" class="form-control is-valid w-50" id="validationServer01" value="Mark" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-12">
            <label for="validationServerUsername" class="form-label">Username</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend3">@</span>
                <input type="text" class="form-control is-invalid w-50 " id="validationServerUsername"
                    aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
        </div>
        <div class="col-md-12 ml-3 ">
            <label for="validationServer03" class="form-label">City</label>
            <input type="text" class="form-control is-invalid w-50  " id="validationServer03"
                aria-describedby="validationServer03Feedback" required>
            <div id="validationServer03Feedback" class="invalid-feedback">
                Please provide a valid city.
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <button class="btn btn-primary w-50" type="submit">Submit form</button>
        </div>
    </form>
        </div>
        
    </div>
    
    <script src="bootstrap.bundle.js"></script>
</body>

</html>