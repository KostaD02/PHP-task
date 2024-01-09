<form method="POST" action="index.php?page=admin&sub_page=edit_about" style="display: none;">
  <input type="text" name="about_company" id="about_company_input">
  <input type="text" name="history" id="history_input">
  <button id="submit">დადასტურება</button>
</form>
<section class="edit_about mt-4">
  <aside>
    <div class="editor-container" id="history_editor" data-name="history">
    </div>
  </aside>
  <aside>
    <div class="editor-container" id="company_editor" data-name="about_company">
    </div>
  </aside>
</section>
<section class="mt-3 flex-center">
  <button class="btn btn-success" id="update">გაანახლე ყველა</button>
</section>
<script>
  const editors = document.querySelectorAll(".editor-container");
  const quils = [];
  fetch("./assets/data/about.json").then(res => res.json()).then(result => {
    quils.forEach(editor => {
      editor.clipboard.dangerouslyPasteHTML(result[editor.container.getAttribute('data-name')]);
    })
  })
  editors.forEach(editor => {
    const quill = new Quill(`#${editor.id}`, {
      modules: {
        toolbar: [
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote'],
          [{ 'header': 1 }, { 'header': 2 }],
          [{ 'list': 'ordered' }, { 'list': 'bullet' }],
          [{ 'script': 'sub' }, { 'script': 'super' }],
          [{ 'indent': '-1' }, { 'indent': '+1' }],
          [{ 'size': ['small', false, 'large', 'huge'] }],
          [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
          [{ 'color': [] }, { 'background': [] }],
          [{ 'font': [] }],
          [{ 'align': [] }],
          ['clean']
        ]
      },
      placeholder: 'შეიყვანეთ ტექსტი',
      theme: 'snow'
    });
    quils.push(quill);
    console.clear();
  });
  document.querySelector("#update").addEventListener("click", () => {
    const historyData = quils[0].root.innerHTML ?? '';
    const aboutCompanyData = quils[1].root.innerHTML ?? '';
    document.querySelector("#about_company_input").value = aboutCompanyData;
    document.querySelector("#history_input").value = historyData;
    document.querySelector("#submit").click();
  });
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $formData = array(
    'history' => $_POST['history'],
    'about_company' => $_POST['about_company']
  );
  file_put_contents('./assets/data/about.json', json_encode($formData));
  echo '
    <script>
      Swal.fire({
        title: "წარმატებული ოპერაცია",
        text: "თქვენი განახლება წარმატებით დაემატა",
        icon: "success"
      });
    </script>
  ';
  exit;
}
?>