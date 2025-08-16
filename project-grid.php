<?php include './top.inc.php'; ?>
<!-- Start Bread Crumb Area Home 1 -->
<section class="bread-crumb-area" style="background-image: url('assets/web/our service banner.png');">
    <div class="container">
        <div class="bread-crumb-title">
            <h2 class="split-collab">Our Work</h2>
        </div>
        <div class="bread-crumb-wrapper">
            <a href="index.php">Home</a>
            <span>
                <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.90625 7.53125L2.84375 13.625C2.53125 13.9062 2.0625 13.9062 1.78125 13.625L1.0625 12.9062C0.78125 12.625 0.78125 12.1562 1.0625 11.8438L5.875 7L1.0625 2.1875C0.78125 1.875 0.78125 1.40625 1.0625 1.125L1.78125 0.40625C2.0625 0.125 2.53125 0.125 2.84375 0.40625L8.90625 6.5C9.1875 6.78125 9.1875 7.25 8.90625 7.53125Z"
                        fill="white" />
                </svg>
            </span>
            <a href="project-grid.php" class="current-page">Our Work</a>
        </div>
    </div>
</section>
<!-- End Bread Crumb Area Home 1 -->

<!-- Start Offer Area Home 3 -->
<section class="offer-area-home-3 project-grid-area">
    <img src="assets/images/shep/bg-blur-shep-1.png" alt="VRE" class="project-grid-area-1-shep-1 blur-1">
    <img src="assets/images/shep/bg-blur-shep-1.png" alt="VRE" class="project-grid-area-1-shep-2 blur-1">
    <img src="assets/images/shep/bg-blur-shep-1.png" alt="VRE" class="project-grid-area-1-shep-3 blur-1">
    <div class="container">
    <div class="project-grid-btn">
        <ul>
            <li data-filter=".cat-1">Festival Posts</li>
            <li data-filter=".cat-2">Logos</li>
            <li data-filter=".cat-3">Posts</li>
            <li data-filter=".cat-4">YouTube Thumbnails</li>
        </ul>
    </div>
    <div class="offer-wrapper">
        <div class="row justify-content-center project-grid-active">
            <?php 
            // Define folder paths with associated category names
            $folders = [
                'assets/web/Festival Posts' => 'Festival Posts',
                'assets/web/Logos' => 'Logo Design',
                'assets/web/posts' => 'Posts',
                'assets/web/YouTube Thumbnails' => 'Thumbnails'
            ];

            foreach ($folders as $folder => $category) {
                // Check if folder exists
                if (is_dir($folder)) {
                    $files = scandir($folder); // Get all files from the directory

                    if ($files) {
                        foreach ($files as $file) {
                            // Check if the file is an image
                            if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg', 'gif'])) {
                                // Assign category class based on the folder
                                $categoryClass = 'cat-' . array_search($folder, array_keys($folders)) + 1;
                                ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 <?php echo $categoryClass; ?>">
                                    <div class="offer-inner">
                                        <img src="<?php echo $folder . '/' . $file; ?>" alt="Image" class="">
                                        <div class="offer-name">
                                            <h5 class="font-size-1-24"><a href="project-details.php"><?php echo $category; ?></a></h5>
                                            <span>
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                } else {
                    // Display a warning message if a folder does not exist
                    echo "<p class='text-danger'>Folder not found: $folder</p>";
                }
            }
            ?>
        </div>
    </div>
</div>

</section>
<!-- End Offer Area Home 3 -->

<?php include './footer.inc.php'; ?>