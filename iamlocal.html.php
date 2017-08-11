<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Myspot Manual</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="iamlocal_styles.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">


    <form class="form-horizontal">
        <fieldset>

            <!-- Form Name -->
            <legend>I am local!</legend>
            <div class="row">
            <div class="col-md-3"></div>
                <ul>
                    <li class="infotext">Upload link to your Facebook account so that riders who are going to visit spot in your hood could contact with you.</li>
                </ul>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name_surname">Name and surname</label>
                <div class="col-md-4">
                    <input id="name_surname" name="name_surname" type="text" placeholder=""
                           class="form-control input-md">

                </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="fb_link">Link to your Facebook account</label>
                <div class="col-md-4">
                    <input id="fb_link" name="fb_link" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>


            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="button1id">Double Button</label>
                <div class="col-md-8">
                    <button id="button1id" name="button1id" class="btn btn-success">Good Button</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>
</body>
</html>

