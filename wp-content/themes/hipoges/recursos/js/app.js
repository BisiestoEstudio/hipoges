document.addEventListener("DOMContentLoaded", function (event) {
	console.log("JS Listo");
});


/* ----------------- */
/* BLOCKS / Posts Destacados */
/* ----------------- */
document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('.hip-posts-destacados').forEach(destacado => {
		const container = destacado.querySelector('.hip-posts-destacados-grid');
		const cards = container.querySelectorAll('.hip-posts-destacados-post');
		const dots = destacado.querySelectorAll('.hip-posts-destacados-navs-dots span');

		// Update active dot based on current scroll
		const updateActiveDot = () => {
			const scrollLeft = container.scrollLeft;
			const cardWidth = cards[0]?.offsetWidth || 1;
			const index = Math.round(scrollLeft / cardWidth);

			dots.forEach(dot => dot.classList.remove('active'));
			if (dots[index]) dots[index].classList.add('active');
		};

		// Left arrow click
		destacado.querySelector('.hip-posts-destacados-navs-left')?.addEventListener('click', () => {
			if (!cards[0]) return;
			container.scrollBy({ left: -cards[0].offsetWidth, behavior: 'smooth' });
		});

		// Right arrow click
		destacado.querySelector('.hip-posts-destacados-navs-right')?.addEventListener('click', () => {
			if (!cards[0]) return;
			container.scrollBy({ left: cards[0].offsetWidth, behavior: 'smooth' });
		});

		// Dots click
		dots.forEach((dot, index) => {
			dot.addEventListener('click', () => {
				if (!cards[0]) return;
				container.scrollTo({ left: cards[0].offsetWidth * index, behavior: 'smooth' });
			});
		});

		// Drag to scroll
		let isDown = false;
		let startX, scrollLeft;
		container.addEventListener('mousedown', (e) => {
			isDown = true;
			container.classList.add('dragging');
			startX = e.pageX - container.offsetLeft;
			scrollLeft = container.scrollLeft;
		});
		container.addEventListener('mouseleave', () => {
			isDown = false;
			container.classList.remove('dragging');
		});
		container.addEventListener('mouseup', () => {
			isDown = false;
			container.classList.remove('dragging');
			updateActiveDot();
		});
		container.addEventListener('mousemove', (e) => {
			if (!isDown) return;
			e.preventDefault();
			const x = e.pageX - container.offsetLeft;
			const walk = (x - startX) * 1.5;
			container.scrollLeft = scrollLeft - walk;
		});

		// Scroll listener to update dot
		container.addEventListener('scroll', () => {
			clearTimeout(container._scrollTimeout);
			container._scrollTimeout = setTimeout(updateActiveDot, 100); // debounce a bit
		});
	});
});


/* ----------------- */
/* BLOCKS / Timeline */
/* ----------------- */
document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('.hip-timeline-grid .acf-innerblocks-container').forEach(container => {
		let isDown = false;
		let startX;
		let scrollLeft;

		container.addEventListener('mousedown', (e) => {
			isDown = true;
			container.classList.add('dragging');
			startX = e.pageX - container.offsetLeft;
			scrollLeft = container.scrollLeft;
		});

		container.addEventListener('mouseleave', () => {
			isDown = false;
			container.classList.remove('dragging');
		});

		container.addEventListener('mouseup', () => {
			isDown = false;
			container.classList.remove('dragging');
		});

		container.addEventListener('mousemove', (e) => {
			if (!isDown) return;
			e.preventDefault();
			const x = e.pageX - container.offsetLeft;
			const walk = (x - startX) * 1.5; // scroll speed
			container.scrollLeft = scrollLeft - walk;
		});
	});
});

/* ----------------- */
/* BLOCKS / Cifras */
/* ----------------- */
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.hip-cifras-arrows-left').forEach(leftBtn => {
		leftBtn.addEventListener('click', () => {
			const container = leftBtn.closest('.hip-cifras').querySelector('.hip-cifras-carrusel .acf-innerblocks-container');
			const card = container.querySelector('.hip-cifras-card-interior');
			if (card) container.scrollBy({ left: -card.offsetWidth, behavior: 'smooth' });
		});
	});

	document.querySelectorAll('.hip-cifras-arrows-right').forEach(rightBtn => {
		rightBtn.addEventListener('click', () => {
			const container = rightBtn.closest('.hip-cifras').querySelector('.hip-cifras-carrusel .acf-innerblocks-container');
			const card = container.querySelector('.hip-cifras-card-interior');
			if (card) container.scrollBy({ left: card.offsetWidth, behavior: 'smooth' });
		});
	});
    
	document.querySelectorAll('.hip-cifras-carrusel .acf-innerblocks-container').forEach(container => {
    if (container.closest('.editor-styles-wrapper'))
      return; // Skip if inside editor

		let isDown = false;
		let startX;
		let scrollLeft;

		container.addEventListener('mousedown', (e) => {
			isDown = true;
			container.classList.add('dragging');
			startX = e.pageX - container.offsetLeft;
			scrollLeft = container.scrollLeft;
		});

		container.addEventListener('mouseleave', () => {
			isDown = false;
			container.classList.remove('dragging');
		});

		container.addEventListener('mouseup', () => {
			isDown = false;
			container.classList.remove('dragging');
		});

		container.addEventListener('mousemove', (e) => {
			if (!isDown) return;
			e.preventDefault();
			const x = e.pageX - container.offsetLeft;
			const walk = (x - startX) * 1.5; // scroll speed
			container.scrollLeft = scrollLeft - walk;
		});
	});
});


/* ----------------- */
/* BLOCKS / Testimonios / Ventajas */
/* ----------------- */
document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('.hip-ventajas-arrows-left').forEach(leftBtn => {
		leftBtn.addEventListener('click', () => {
			const container = leftBtn.closest('.hip-ventajas').querySelector('.hip-ventajas-grid .acf-innerblocks-container');
			const card = container.querySelector('.hip-ventajas-card-interior');
			if (card) container.scrollBy({ left: -card.offsetWidth, behavior: 'smooth' });
		});
	});

	document.querySelectorAll('.hip-ventajas-arrows-right').forEach(rightBtn => {
		rightBtn.addEventListener('click', () => {
			const container = rightBtn.closest('.hip-ventajas').querySelector('.hip-ventajas-grid .acf-innerblocks-container');
			const card = container.querySelector('.hip-ventajas-card-interior');
			if (card) container.scrollBy({ left: card.offsetWidth, behavior: 'smooth' });
		});
	});

	document.querySelectorAll('.hip-ventajas-grid .acf-innerblocks-container').forEach(container => {
		let isDown = false;
		let startX;
		let scrollLeft;

		container.addEventListener('mousedown', (e) => {
			isDown = true;
			container.classList.add('dragging');
			startX = e.pageX - container.offsetLeft;
			scrollLeft = container.scrollLeft;
		});

		container.addEventListener('mouseleave', () => {
			isDown = false;
			container.classList.remove('dragging');
		});

		container.addEventListener('mouseup', () => {
			isDown = false;
			container.classList.remove('dragging');
		});

		container.addEventListener('mousemove', (e) => {
			if (!isDown) return;
			e.preventDefault();
			const x = e.pageX - container.offsetLeft;
			const walk = (x - startX) * 1.5; // scroll speed
			container.scrollLeft = scrollLeft - walk;
		});
	});
});