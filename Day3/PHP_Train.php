<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container mt-5 ">
        <div class="row">
            <form class="row g-3">
                <div class="col-md-6">
                  <label for="validationServer01" class="form-label">Full Name</label>
                  <input type="text" class="form-control is-valid" id="validationServer01" value="Mohamed" required="">
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="validationServerUsername" class="form-label">Username</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend3">@</span>
                    <input type="text" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required="">
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                      Enter your username.
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="validationServer03" class="form-label">age</label>
                  <input type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required="">
                  <div id="validationServer03Feedback" class="invalid-feedback">
                  Enter Your age.
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="validationServer04" class="form-label">Gender</label>
                  <select class="form-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                    <option selected="" disabled="" value="">Choose Your Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                  <div id="validationServer04Feedback" class="invalid-feedback">
                  select Gender.
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="validationServer05" class="form-label">Grade</label>
                  <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required="">
                  <div id="validationServer05Feedback" class="invalid-feedback">
                  Enter num between 0-100.
                  </div>
                </div>
                <div class="mb-3 col-12">
                      <label for="validationTextarea" class="form-label">Notes</label>
                      <textarea class="form-control" id="validationTextarea" aria-describedby="validationServer05Feedback" placeholder="Required example textarea" required=""></textarea>
                      <div id="validationServer06Feedback" class="invalid-feedback">
                      Enter a message.
                      </div>
                </div>
                <div class="col-6 col-md-6">
                    <button class="btn btn-primary w-100" type="submit">Submit form</button>
                </div>
                <div class="col-md-6 " >
                      <button type="button" class="btn btn-secondary  w-100" data-bs-toggle="modal" data-bs-target="#studentsModal">
                        Show Students
                      </button>
                </div>
      </div> 
    </div>
    </form>



  <div class="modal fade" id="studentsModal" tabindex="-1" aria-labelledby="studentsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="studentsModalLabel">Students Table</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="table-responsive">

            <?php
          
            $students = [
              ["name" => "Mohamed Ayman", "email" => "mohamed@example.com", "grade" => 90],
              ["name" => "Momen Ayman", "email" => "momen@example.com", "grade" => 67],
              ["name" => "Ayman Saad", "email" => "ayman@example.com", "grade" => 45],
            ];
            ?>

            <table class="table table-bordered table-hover text-center">
              <thead class="table-dark">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Grade</th>
                  <th>Evaluation</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($students as $index => $student): ?>
                  <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $student['name'] ?></td>
                    <td><?= $student['email'] ?></td>
                    <td><?= $student['grade'] ?></td>
                    <td>
                      <?php
                        if ($student['grade'] >= 85) {
                          echo "Excellent";
                        } elseif ($student['grade'] >= 70) {
                          echo "Good";
                        } elseif ($student['grade'] >= 50) {
                          echo "Pass";
                        } else {
                          echo "Fail";
                        }
                      ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>
  </div>

        </div>
    </div>
    </div>

   
    <script src="bootstrap.bundle.js"></script>
</body>
</html>
