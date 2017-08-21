<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Myspots/I'am local</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../assets/iamlocal_styles.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">

    <form class="form-horizontal" method="post" action="/add_me">
        <fieldset>

            <!-- Form Name -->

            <legend>I am local in: <?php echo $skatepark['city'] . " " . $skatepark['street'] ?></legend>
            <div class="row">
                <div class="col-md-3"></div>
                <ul>
                    <li class="infotext">Upload link to your Facebook account so that riders who are going to visit spot
                        in your hood could contact with you.
                    </li>
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

            <input type="hidden" value="<?php echo intval($_GET['id']) ?>" name="skatepark_id">


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="fb_link">Link to your Facebook account</label>
                <div class="col-md-4">
                    <input id="fb_link" name="fb_link" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-success">Add me!</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>
</body>
</html>

