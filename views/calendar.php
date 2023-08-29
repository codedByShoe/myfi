<div x-data="{ 
	modalOpen: false,
	eventDate: '',
	getEventDetails(date) {
		this.modalOpen = true
		this.eventDate = date
	}
       
	}">
	<div class="container mx-auto">
		<?= $calendar ?>
	</div>

	<?= $this->fetch('components/calendar-modal.php') ?>
</div>
