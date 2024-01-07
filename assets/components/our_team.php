<?php
$jsonString = file_get_contents('./assets/data/about/our_team.json');
$jsonData = json_decode($jsonString, true);

if ($jsonData === null) {
  die('Error');
}

$members = $jsonData['members'];

foreach ($members as $member) {
  $email = $member['socials']['email'] ?? '';
  $github = $member['socials']['github'] ?? '';
  $facebook = $member['socials']['facebook'] ?? '';
  $personal_website = $member['socials']['personal_website'] ?? '';
  ?>
  <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="<?php echo $member['imageSrc']; ?>" alt="<?php echo $member['name']; ?>'s image">
    <div class="card-body">
      <h5 class="card-title">
        <?php echo $member['name'] . ' ' . $member['lastName']; ?>
      </h5>
      <p class="card-text">
        როლი:
        <?php echo $member['role']; ?>
        <br>
        ასაკი:
        <?php echo $member['age']; ?>
      </p>
    </div>
    <div class="card-footer">
      <ul class="socials flex-center" style="list-style: none">
        <?php echo $email ? '<li><a href="mailto:' . $email . '"><i class="fa-solid fa-envelope"></i></a></li>' : ''; ?>
        <?php echo $github ? '<li><a href="' . $github . '" target="_blank"><i class="fa-brands fa-github"></i></a></li>' : ''; ?>
        <?php echo $facebook ? '<li><a href="' . $facebook . '" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>' : ''; ?>
        <?php echo $personal_website ? '<li><a href="' . $personal_website . '" target="_blank"><i class="fa-brands fa-chrome"></i></a></li>' : ''; ?>
      </ul>
    </div>
  </div>
  <?php
}
?>