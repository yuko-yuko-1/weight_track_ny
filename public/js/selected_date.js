document.addEventListener('DOMContentLoaded', function () {
    const days = document.querySelectorAll('ul.days li');
    days.forEach(function (day) {
        day.addEventListener('click', function () {
            const dayNumber = this.getAttribute('data-day');
            const year = this.getAttribute('data-year');
            const monthText = this.getAttribute('data-month');
            if (dayNumber && year && monthText) {
                days.forEach(function (d) {
                    d.classList.remove('selected');
                });
                this.classList.add('selected');
                const monthNumeric = getMonthNumber(monthText);
                fetch(`/meals/${year}/${monthNumeric}/${dayNumber}`)
                    .then(response => {
                        if (!response.ok) {
                            if (response.status === 204) {
                                throw new Error('No meal data available for this day');
                            } else {
                                throw new Error('Failed to fetch meal data: ' + response.status);
                            }
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data) {
                            updateMealUI(data);
                        } else {
                            clearUI();
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching meal data:', error);
                        clearUI();
                    });
            }
        });
    });
    function getMonthNumber(monthText) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        return months.findIndex(month => month.toLowerCase() === monthText.toLowerCase()) + 1;
    }
    function updateMealUI(mealData) {
        const dateRecordElem = document.getElementById('date_record');
        const timeCreatedElem = document.getElementById('time_created');
        const postMealImgElem = document.getElementById('post_meal_img');
        const memoDescElem = document.getElementById('memo_desc');
        const noPostTextElem = document.getElementById('no_post_text');
        const deleteButton = document.querySelector('.btn[data-bs-target^="#meals_delete_"]');
        if (!mealData) {
            console.error('Error: Meal data is undefined or null.');
            clearUI();
            return;
        }
        if (dateRecordElem) {
            dateRecordElem.textContent = mealData.record_date || '';
        }
        if (timeCreatedElem) {
            timeCreatedElem.innerHTML = mealData.created_at ? ` ${new Date(mealData.created_at).toLocaleTimeString()}` : '';
        }
        if (postMealImgElem && postMealImgElem.tagName === 'IMG') {
            if (mealData.image) {
                const imageUrl = '/images/meal/' + mealData.image;
                postMealImgElem.src = imageUrl;
                postMealImgElem.alt = "Latest Meal";
                postMealImgElem.classList.add('grid-img');
                postMealImgElem.style.display = 'block';
                if (noPostTextElem) noPostTextElem.style.display = 'none';
            } else {
                postMealImgElem.src = "";
                postMealImgElem.alt = "";
                postMealImgElem.classList.remove('grid-img');
                postMealImgElem.style.display = 'none';
                if (noPostTextElem) noPostTextElem.style.display = 'block';
            }
        }
        if (memoDescElem) {
            memoDescElem.textContent = mealData.description || 'No description available';
        }
        // Delete button
        if (deleteButton) {
            if (mealData.id) {
                deleteButton.dataset.bsTarget = `#meals_delete_${mealData.id}`;
                deleteButton.style.display = 'block';
            } else {
                deleteButton.style.display = 'none';
            }
        }
    }
    function clearUI() {
        const dateRecordElem = document.getElementById('date_record');
        const timeCreatedElem = document.getElementById('time_created');
        const postMealImgElem = document.getElementById('post_meal_img');
        const memoDescElem = document.getElementById('memo_desc');
        const noPostTextElem = document.getElementById('no_post_text');
        const noMealDataElem = document.getElementById('no_meal_data');
        const noCreationTimeElem = document.getElementById('no_creation_time');
        const noMealAvailableElem = document.getElementById('no_meal_available');
        const noDescriptionElem = document.getElementById('no_description');
        const deleteButton = document.querySelector('.btn[data-bs-target^="#meals_delete_"]');
        if (dateRecordElem) dateRecordElem.textContent = '';
        if (timeCreatedElem) timeCreatedElem.innerHTML = '';
        if (postMealImgElem) {
            postMealImgElem.src = '';
            postMealImgElem.alt = '';
            postMealImgElem.classList.remove('grid-img');
            postMealImgElem.style.display = 'none';
        }
        if (memoDescElem) memoDescElem.textContent = '';
        if (noPostTextElem) noPostTextElem.style.display = 'block';
        if (noMealDataElem) noMealDataElem.style.display = 'block';
        if (noCreationTimeElem) noCreationTimeElem.style.display = 'block';
        if (noMealAvailableElem) noMealAvailableElem.style.display = 'block';
        if (noDescriptionElem) noDescriptionElem.style.display = 'block';
        if (deleteButton) deleteButton.style.display = 'none';
    }
    const today = new Date();
    const year = today.getFullYear();
    const month = today.getMonth() + 1;
    const day = today.getDate();
    fetchMealData(year, month, day);
});
function fetchMealData(year, month, day) {
    fetch(`/meals/${year}/${month}/${day}`)
        .then(response => {
            if (!response.ok) {
                if (response.status === 204) {
                    throw new Error('No meal data available for this day');
                } else {
                    throw new Error('Failed to fetch meal data: ' + response.status);
                }
            }
            return response.json();
        })
        .then(data => {
            if (data) {
                updateMealUI(data);
            } else {
                clearUI();
            }
        })
        .catch(error => {
            console.error('Error fetching meal data:', error);
            clearUI();
        });
}



