<?php
declare(strict_types=1);
?>

<?php function drawProfile(User $user){?>
        <!DOCTYPE html>
        <div class="main-content">
            <form id="profile-form" action="../actions/action_edit_profile.php" method="post" class="profile">

            <section class="avatar-password">
                <div class="avatar">
                    <img src = "<?=$user->image?>" alt="user image">
                    <div class="camera">
                        <label for="image-upload" class="camera-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="50px" height="50px" viewBox="0 0 32 32">
                            <path d="M29 7h-4.599l-2.401-4h-12l-2.4 4h-4.6c-1 0-3 1-3 2.969v16.031c0 1.657 1.5 3 2.792 3h26.271c1.313 0 2.938-1.406 2.938-2.968v-16.032c0-1-1-3-3-3zM30 26.032c0 0.395-0.639 0.947-0.937 0.969h-26.265c-0.232-0.019-0.797-0.47-0.797-1v-16.031c0-0.634 0.851-0.953 1-0.969h5.732l2.4-4h9.802l1.785 3.030 0.55 0.97h5.731c0.705 0 0.99 0.921 1 1v16.032zM16 10c-3.866 0-7 3.134-7 7s3.134 7 7 7 7-3.134 7-7-3.134-7-7-7zM16 22c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"/>
                            </svg>
                        </label>
                        <input type="file" id="image-upload" name="image" accept="image/*" style="display: none;">
                    </div>
                </div>
                <div class="name-card">
                    <p><?= $user->username ?></p>
                </div>
                <section class="optinal-section">
                    <div class="optional-form">
                        <h2>Optional:</h2>
                        <label for="current-pass"></label>
                        <input id="current-pass" class="input-field" type="password" name = "current-pass" placeholder="Current Password">
                        <label for="new-pass"></label>
                        <input id="new-pass" class="input-field" type="password" name = "new-pass" placeholder="New Password">
                        <label for="confirm-pass"></label>
                        <input id="confirm-pass" class="input-field" type="password" name = "confirm-pass" placeholder="Confirm Password">
                    </div>
                </section>
            </section>
            <section class="personal-section">
                <div class="personal-form">
                    <h2>Personal Information:</h2>
                    <label for="name">Full name:</label>
                    <input id="name" class="input-field" type="text" name="name" placeholder="<?= $user->fullName ?>">
                    <label for="username">Username:</label>
                    <input id="username" class="input-field" type="text" name="username"  placeholder=<?= $user->username?>>
                    <label for="email">Email:</label>
                    <input id="email" class="input-field" type="email" name="email" placeholder=<?= $user->email?>>
                    <button type="submit">UPDATE</button>
                </div>
            </section>
            </form>
        </div>
    <?php } ?>
