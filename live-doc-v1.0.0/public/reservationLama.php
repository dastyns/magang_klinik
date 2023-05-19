<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link href="assets/css/theme.css" rel="stylesheet" />
</head>

<body>
    <div class="container" style="padding-top: 40px;">
        <div class="row">
            <div class="col-12 py-3">
                <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/people.png);background-position:top center;background-size:contain;">
                </div>

                <h1 class="text-center">APPOINTMENT</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/dot-bg.png);background-position:bottom right;background-size:auto;">
            </div>

            <div class="col-lg-6 z-index-2 mb-5"><img class="w-100" src="assets/img/gallery/appointment.png" alt="..." /></div>
            <div class="col-lg-6 z-index-2">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label class="visually-hidden" for="inputName">Name</label>
                        <input class="form-control form-livedoc-control" id="inputName" type="text" placeholder="Name" />
                    </div>
                    <div class="col-md-6">
                        <label class="visually-hidden" for="inputPhone">Phone</label>
                        <input class="form-control form-livedoc-control" id="inputPhone" type="text" placeholder="Phone" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label visually-hidden" for="inputCategory">Category</label>
                        <select class="form-select" id="inputCategory">
                            <option selected="selected">Category</option>
                            <option> Category One</option>
                            <option> Category Two</option>
                            <option> Category Three</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label visually-hidden" for="inputEmail">Email</label>
                        <input class="form-control form-livedoc-control" id="inputEmail" type="email" placeholder="Email" />
                    </div>
                    <div class="col-md-12">
                        <label class="form-label visually-hidden" for="validationTextarea">Message</label>
                        <textarea class="form-control form-livedoc-control" id="validationTextarea" placeholder="Message" style="height: 250px;" required="required"></textarea>
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button class="btn btn-primary rounded-pill" type="submit">Make an Appointment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>