var $j = jQuery;
const section = $j('.sect')

section.on('click', function (e) {
  console.log(e)
  if (!e.currentTarget.children[1].style.display) {
    e.currentTarget.children[1].style.display = 'block'
    e.currentTarget.children[0].children[0].classList.add('opened')
    e.currentTarget.children[1].classList.remove('hide_text')
    e.currentTarget.children[1].classList.add('show_text')
  } else {
    e.currentTarget.children[1].classList.remove('show_text')
    e.currentTarget.children[0].children[0].classList.remove('opened')
    e.currentTarget.children[1].classList.add('hide_text')


    setTimeout(() => {
      e.currentTarget.children[1].style.display = ''
    }, 300)
  }
})
$j(document).ready(function(){
  // Добавить плавную прокрутку до всех ссылок
  $j("a").on('click', function(event) {

    // Убедись в этом что .hash имеет значение перед переопределением поведения по умолчанию
    if (this.hash !== "") {
      // Запретить поведение щелчка якоря по умолчанию
      event.preventDefault();

      // Хранить хэш
      var hash = this.hash;

      // Использование метода animate() jQuery для добавления плавной прокрутки страницы
      // Необязательное число (800) указывает количество миллисекунд, необходимых для прокрутки до указанной области
      $j('html, body').animate({
        scrollTop: $j(hash).offset().top
      }, 500, function(){

        // Добавить хэш (#) для URL-адреса после завершения прокрутки (поведение щелчка по умолчанию)
        window.location.hash = hash;
      });
    } // Конец, если
  });
});
