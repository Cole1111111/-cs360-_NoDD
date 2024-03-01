<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <title>NoDD Prof Input</title>
</head>

<body>
    <!-- -->
    <form>
        <div>
            <!--input for variables -->
            <label for="varinput">Input Variables:</label>
            <input type="text" id="varinput" name="varinput" placeholder="a,b,c,d">
        </div>
        <br>
        <div>
            <!--input for dependancies of variables -->
            <label for="depinput">Input Variables Dpendencies:</label>
            <input type="text" id="depinput" name="depinput" placeholder="{a,b,c}->{d}, {d}->{a}">
        </div>
        <br>
        <div>
            <input type = "reset">
        </div>
        <br>
        <div>
            <input type = "submit">
        </div>
    </form>

    <nav class="navbar navbar-expand-sm navbar bg-success">
        <div class="container-xxl">
            <!-- Logo -->
            <a class="navbar-brand" href="index.html">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
                aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>
    <!-- End top bar -->

    <div class="row">
        <div class="col-sm-12 text-center p-4" style="background-color: rgb(142, 200, 255); height: 100px;">
            <h1>NoDD</h1>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-5">
        <div class="container">

        </div>
    </footer>

</body>

</html>