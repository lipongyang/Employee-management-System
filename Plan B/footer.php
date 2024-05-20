<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://kit.fontawesome.com/7c307960ef.js" crossorigin="anonymous"></script>
<script>
    let menutoggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    menutoggle.onclick = function() {
        menutoggle.classList.toggle('active')
        navigation.classList.toggle('active')
    }
    // ------------add active class for selective item-----------//
    let list = document.querySelectorAll('.list');
    for (let i = 0; i < list.length; i++) {
        list[i].onclick = function() {
            let j = 0;
            while (j < list.length) {
                list[j++].className = 'list';
            }
            list[i].className = 'list active';
        }
    }
</script>
</body>

</html>