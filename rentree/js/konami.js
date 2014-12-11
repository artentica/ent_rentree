function konami(){
	{

					//Haut, haut, bas, bas, gauche, droite, gauche, droite, b, a
			var k = [38, 38, 40, 40, 37, 39, 37, 39, 66 , 65],
			n = 0;
			$(document).keydown(function (e)
			{
				if (e.keyCode === k[n++])
				{
					if (n === k.length)
					{		
							$('body').css( "background-image", "url('konamicode/tardis.gif')" );
							$('body').css( "background-repeat", "no-repeat" );
							$('body').css( "background-size", "cover" );
							$('body').css( "background-position", "0% 25%" );
							$('.center').css( "color", "red" );
							$('.texte').css( "color", "red" );
							$('.monLabel').css( "color", "red" );
							var win = new Audio('konamicode/nyanlooped.mp4');
							win.loop = true;
							win.play();				 	
						return !1
					}
				} else n = 0
			});
		}
}