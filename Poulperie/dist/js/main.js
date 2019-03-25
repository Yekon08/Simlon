window.addEventListener('scroll', function()
    {
        if (window.scrollY>10)
        {
           document.querySelector('nav').classList.add('color_nav'); 
           document.querySelector('.nav1').classList.add('img_nav');
        }
        else
        {
            document.querySelector('nav').classList.remove('color_nav');
            document.querySelector('.nav1').classList.remove('img_nav');
        }
    });

// Set initial state of menu
let show_menu = false;

document.querySelector('.container_burger').addEventListener('click', toggle_menu);

function toggle_menu()
{
    if(!show_menu)
    {
        document.querySelector('.container_burger').classList.add('close');
        document.querySelector('nav').style.backgroundColor = "#333333";
        document.querySelector('nav').classList.add('nav_mobile');
        document.querySelector('ul').style.display = 'flex';

        // reset menu
        show_menu = true;
    }
    else
    {
        document.querySelector('ul').style.display = 'none';
        document.querySelector('.container_burger').classList.remove('close');
        document.querySelector('nav').classList.remove('nav_mobile');
        document.querySelector('nav').style.backgroundColor = "transparent";

        // reset menu
        show_menu = false;
    }
}