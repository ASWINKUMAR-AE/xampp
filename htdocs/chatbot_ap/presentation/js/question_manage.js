
$(document).ready(function () {
    fetchQuestions();

    // Fetch questions
   function fetchQuestions() {
    $.ajax({
        url: '../data_fetch/fetch_question_admin.php',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            const container = $('#questionsContainer');
            container.empty();
            data.forEach(question => renderQuestion(question, container));
            populateParentDropdown(data);
        },
        error: function () {
            Swal.fire('Error', 'Failed to fetch questions.', 'error');
        }
    });
}

    // // Render parent question card
    // function renderParentQuestion(parentQuestion, container) {
    //     const card = $(`
    //         <div class="card mb-4">
    //             <div class="card-header d-flex justify-content-between align-items-center" style="color: #d4edda;">
    //                 <strong>${parentQuestion.question_text}</strong>
    //                 <div>
    //                     <button class="btn btn-warning btn-sm edit" data-id="${parentQuestion.id}"><i class="fas fa-pen"></i> </button>
    //                     <button class="btn btn-danger btn-sm delete" data-id="${parentQuestion.id}"><i class="fas fa-trash"></i>delete </button>
    //                 </div>
    //             </div>
    //             <div class="card-body">
    //                 <div class="answer mb-3">${parentQuestion.answer_text}</div>
    //                 <ul class="list-group"></ul>
    //                 <button class="btn btn-outline-info btn-sm mt-2 add-child" data-id="${parentQuestion.id}">
    //                     <i class="fas fa-plus"></i> Add Child Question
    //                 </button>
    //             </div>
    //         </div>
    //     `);
    //     container.append(card);

    //     if (parentQuestion.children) {
    //         parentQuestion.children.forEach(child => renderChildQuestion(child, card.find('.list-group')));
    //     }
    // }

    // Render child questions
    function renderQuestion(question, container, level = 0) {
        const element = level === 0 ? $(`
            <div class="card mb-4" style="border: 1px solid #dee2e6;">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #d4edda;">
                    <h5>Question : ${question.question_text}</h5>
                    <div>
                        <button class="btn btn-warning btn-sm edit m-1" data-id="${question.id}"><i class="fas fa-pen"></i></button>
                        <button class="btn btn-danger btn-sm delete m-1" data-id="${question.id}"><i class="fas fa-trash"></i> <span class="d-none"> </span></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="answer mb-3">Answer : ${question.answer_text}</div>
                    <ul class="list-group" data-id="${question.id}"></ul>
                    <button class="btn btn-outline-info btn-sm mt-2 add-child" data-id="${question.id}">
                        <i class="fas fa-plus"></i> Add Child Question
                    </button>
                </div>
            </div>
        `) : $(`
            <li class="list-group-item" style="margin-left: ${level * 20}px; border: 1px solid #dee2e6;"> Question :
                ${question.question_text}
                <div class="answer mb-3">Answer : ${question.answer_text}</div>
                <div class="float-end">
                    <button class="btn btn-warning btn-sm edit m-1" data-id="${question.id}"><i class="fas fa-pen"></i> </button>
                    <button class="btn btn-danger btn-sm delete m-1" data-id="${question.id}"><i class="fas fa-trash"></i> </button>
                </div>
            </li>
        `);

        container.append(element);
        const childContainer = level === 0 ? element.find('ul') : container;
        question.children.forEach(child => renderQuestion(child, childContainer, level + 1));
    }
    // Populate parent question dropdown
    function populateParentDropdown(questions) {
        const dropdown = $('#parentQuestion');
        dropdown.empty().append('<option value="">Main Parent Node</option>');
        questions.forEach(question => {
            if (!question.parent_question_id) {
                dropdown.append(`<option value="${question.id}">${question.question_text}</option>`);
            }
        });
    }

$(document).on('click', '.edit', function () {
    const questionId = $(this).data('id');

    // Fetch the specific question details from the server to ensure we have the most recent data
    $.ajax({
        url: '../data_fetch/fetch_question_details.php',
        method: 'GET',
        data: { id: questionId },
        dataType: 'json',
        success: function (question) {
            const questionText = question.question_text;
            const answerText = question.answer_text;
            const parentQuestionId = question.parent_question_id;

            Swal.fire({
                title: 'Edit Question',
                html: `
                    <div class="mb-3">
                        <label for="editQuestionText" class="form-label">Question</label>
                        <input type="text" id="editQuestionText" class="form-control" value="${questionText}">
                    </div>
                    <div class="mb-3">
                        <label for="editAnswerText" class="form-label">Answer</label>
                        <textarea id="editAnswerText" class="form-control">${answerText}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="parentQuestion" class="form-label">Choose Parent Question or Leave</label>
                        <select id="parentQuestion" class="form-select">
                            <option value="">Choose This For Parent Ques</option>
                        </select>
                    </div>
                `,
                focusConfirm: false,
                preConfirm: () => {
                    const questionText = $('#editQuestionText').val();
                    const answerText = $('#editAnswerText').val();
                    const parentQuestionId = $('#parentQuestion').val() || null;
                    if (!questionText || !answerText) {
                        Swal.showValidationMessage('Both fields are required');
                        return false;
                    }
                    return { questionText, answerText, parentQuestionId };
                },
                didOpen: () => {
                    $.ajax({
                        url: '../data_fetch/fetch_question_admin.php',
                        method: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            const parentQuestionSelect = $('#parentQuestion');
                            parentQuestionSelect.empty().append('<option value="">Choose This For Parent Ques</option>');
                            data.forEach(question => {
                                if (question.id !== questionId) {
                                    parentQuestionSelect.append(`<option value="${question.id}" ${question.id === parentQuestionId ? 'selected' : ''}>${question.question_text}</option>`);
                                }
                            });
                        },
                        error: function () {
                            Swal.fire('Error', 'Failed to fetch questions.', 'error');
                        }
                    });
                }
            }).then(result => {
                if (result.isConfirmed) {
                    const data = {
                        id: questionId,
                        question_text: result.value.questionText,
                        answer_text: result.value.answerText,
                        parent_question_id: result.value.parentQuestionId || null // Handle null value
                    };

                    $.post('../data_proccessing/edit_ques.php', data, function (response) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });

                        if (response.success) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Question updated successfully.'
                            });
                            fetchQuestions();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.error || 'Failed to update the question.'
                            });
                        }
                    }, 'json').fail(function () {
                        Toast.fire({
                            icon: 'error',
                            title: 'Failed to update the question.'
                        });
                    });
                }
            });
        },
        error: function () {
            Swal.fire('Error', 'Failed to fetch question details.', 'error');
        }
    });
});



   $('#addQuestionForm').on('submit', function (e) {
    e.preventDefault();
    const data = {
        question_text: $('#questionText').val(),
        answer_text: $('#answerText').val(),
        parent_question_id: $('#parentQuestion').val() || null
    };
    $.post('../data_proccessing/add_ques.php', data, function (response) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        if (response.success) {
            Toast.fire({
                icon: 'success',
                title: 'Question added successfully.'
            });
            fetchQuestions();
        } else {
            Toast.fire({
                icon: 'error',
                title: response.error || 'Failed to add question.'
            });
        }
    }, 'json').fail(function () {
        Toast.fire({
            icon: 'error',
            title: 'Failed to add question.'
        });
    });
});

    
$(document).on('click', '.add-child', function() {
    const parentId = $(this).data('id'); // Current parent ID
    const parentQuestionElement = $(`[data-id="${parentId}"]`).closest('.card'); // Find the current parent's card

    // Dynamically generate child options
    const childOptionsHtml = parentQuestionElement
        .find('ul.list-group li')
        .map(function() {
            const id = $(this).find('.edit').data('id'); // Get the question ID
            const text = $(this).text().trim(); // Get the question text
            return `<option value="${id}">${text}</option>`;
        })
        .get()
        .join('');

    const parentQuestionHtml = `
        <div class="mb-3">
            <label for="parentQuestion2" class="form-label">Choose Sub Parent (Optional)</label>
            <select id="parentQuestion2" class="form-select">
                <option value="">Choose Sub Parent Question</option>
                ${childOptionsHtml}
            </select>
        </div>
    `;

    Swal.fire({
        title: 'Add Child Question',
        html: `
            <div class="mb-3">
                <label for="childQuestionText" class="form-label">Enter Question</label>
                <input type="text" id="childQuestionText" class="form-control" placeholder="Enter Question">
            </div>
            <div class="mb-3">
                <label for="childAnswerText" class="form-label">Enter Answer</label>
                <textarea id="childAnswerText" class="form-control" placeholder="Enter Answer"></textarea>
            </div>
            ${parentQuestionHtml}
        `,
        focusConfirm: false,
        preConfirm: () => {
            const questionText = $('#childQuestionText').val();
            const answerText = $('#childAnswerText').val();
            const parentQuestionId = $('#parentQuestion2').val();
            if (!questionText || !answerText) {
                Swal.showValidationMessage('Both fields are required');
                return false;
            }
            return { questionText, answerText, parentQuestionId };
        }
    }).then(result => {
        if (result.isConfirmed) {
            const data = {
                question_text: result.value.questionText,
                answer_text: result.value.answerText,
                parent_question_id: result.value.parentQuestionId || parentId // Default to the current parent
            };
            $.post('../data_proccessing/add_ques.php', data, function(response) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });

                if (response.success) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Child question added successfully.'
                    });
                    fetchQuestions();
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.error || 'Failed to add child question.'
                    });
                }
            }, 'json').fail(function() {
                Toast.fire({
                    icon: 'error',
                    title: 'Failed to add child question.'
                });
            });
        }
    });
});

   

   $(document).on('click', '.delete', function () {
    const questionId = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: 'This will delete the question and all its child questions.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then(result => {
        if (result.isConfirmed) {
            $.post('../data_proccessing/delete_ques.php', { id: questionId }, function (response) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });

                if (response.success) {
                    Toast.fire({
                        icon: 'success',
                        title: 'The question has been deleted.'
                    });

                    // Remove the question and its children from the DOM
                    const parentElement = $(`[data-id="${questionId}"]`).closest('.card, .list-group-item');
                    parentElement.remove();
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.error || 'Failed to delete the question.'
                    });
                }
            }, 'json').fail((jqXHR, textStatus, errorThrown) => {
                console.error('AJAX Error:', textStatus, errorThrown);
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });

                Toast.fire({
                    icon: 'error',
                    title: `Failed to communicate with the server: ${textStatus}`
                });
            });
        }
    });
});
});