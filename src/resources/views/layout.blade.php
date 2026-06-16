<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WoW Item Codex</title>
    <meta name="description" content="The World of Warcaft item codex">
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css " rel="stylesheet"
        integrity=" sha384 - sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB " crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-warning mb-3" data-bs-theme="dark">
        <header class="container">
            <a class="navbar-brand" href="#">WoW Classic Item Codex</a>
        </header>
    </nav>

    <main class="container">
        <div class="row">
            <div class="col">
                @yield("content")
            </div>
        </div>
    </main>

    <footer class="text-bg-primary mt-3">
        <div class="container">
            <div class="row py-5">
                <div class="col">
                    G. Vistins, 2026
                </div>
            </div>
        </div>
    </footer>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js "
        integrity=" sha384 - FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI "
        crossorigin="anonymous"></script>
</body>

</html>