<!-- Footer Start -->
<div class="container-fluid text-white py-4 px-sm-3 px-md-5" style="background: #1A2130;">
    <div class="row">
        <div class="col-md-6 text-center mb-3 mb-md-0 mx-auto">
            <p class="m-0 text-white">
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script>. <?php foreach ($profil as $footer) : ?><?= $footer->teks_footer; ?><?php endforeach; ?>
            </p>
        </div>
    </div>
</div>
<!-- Footer End -->
