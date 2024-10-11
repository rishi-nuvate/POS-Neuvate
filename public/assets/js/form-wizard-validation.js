/**
 *  Form Wizard
 */

'use strict';

(function () {
    const select2 = $('.select2'),
        selectPicker = $('.selectpicker');

    // Wizard Validation
    // --------------------------------------------------------------------
    const wizardValidation = document.querySelector('#wizard-validation');
    if (typeof wizardValidation !== undefined && wizardValidation !== null) {
        // Wizard form
        const wizardValidationForm = wizardValidation.querySelector('#wizard-validation-form');
        // Wizard steps
        const wizardValidationFormStep1 = wizardValidationForm.querySelector('#account-details-validation');
        const wizardValidationFormStep2 = wizardValidationForm.querySelector('#personal-info-validation');
        const wizardValidationFormStep3 = wizardValidationForm.querySelector('#social-links-validation');
        // Wizard next prev button
        const wizardValidationNext = [].slice.call(wizardValidationForm.querySelectorAll('.btn-next'));
        const wizardValidationPrev = [].slice.call(wizardValidationForm.querySelectorAll('.btn-prev'));

        const validationStepper = new Stepper(wizardValidation, {
            linear: true
        });

        // Account details
        const FormValidation1 = FormValidation.formValidation(wizardValidationFormStep1, {
            fields: {
                store_type: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Store Type'
                        }
                    }
                },
                store_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Store name'
                        }
                    }
                },
                store_code: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Store Code'
                        }
                    }
                },
                store_rating: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter store Rating'
                        },
                    }
                },
                store_city: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter City'
                        },
                    }
                },
                store_state: {
                    validators: {
                        notEmpty: {
                            message: 'Please select State'
                        },
                    }
                },
                store_pincode: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter PinCode'
                        },
                    }
                },
                store_area: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Area'
                        },
                    }
                },
                store_add_line_1: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Address Line 1'
                        },
                    }
                },
                store_add_line_2: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Address Line 2'
                        },
                    }
                },
                // formValidationUsername: {
                //     validators: {
                //         notEmpty: {
                //             message: 'The name is required'
                //         },
                //         stringLength: {
                //             min: 6,
                //             max: 30,
                //             message: 'The name must be more than 6 and less than 30 characters long'
                //         },
                //         regexp: {
                //             regexp: /^[a-zA-Z0-9 ]+$/,
                //             message: 'The name can only consist of alphabetical, number and space'
                //         }
                //     }
                // },
                // formValidationEmail: {
                //     validators: {
                //         notEmpty: {
                //             message: 'The Email is required'
                //         },
                //         emailAddress: {
                //             message: 'The value is not a valid email address'
                //         }
                //     }
                // },
                // formValidationPass: {
                //     validators: {
                //         notEmpty: {
                //             message: 'The password is required'
                //         }
                //     }
                // },
                // formValidationConfirmPass: {
                //     validators: {
                //         notEmpty: {
                //             message: 'The Confirm Password is required'
                //         },
                //         identical: {
                //             compare: function () {
                //                 return wizardValidationFormStep1.querySelector('[name="formValidationPass"]').value;
                //             },
                //             message: 'The password and its confirm are not the same'
                //         }
                //     }
                // }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    // Use this for enabling/changing valid/invalid class
                    // eleInvalidClass: '',
                    eleValidClass: '',
                    rowSelector: '.col-sm-6'
                }),
                autoFocus: new FormValidation.plugins.AutoFocus(),
                submitButton: new FormValidation.plugins.SubmitButton()
            },
            init: instance => {
                instance.on('plugins.message.placed', function (e) {
                    //* Move the error message out of the `input-group` element
                    if (e.element.parentElement.classList.contains('input-group')) {
                        e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
                    }
                });
            }
        }).on('core.form.valid', function () {
            // Jump to the next step when all fields in the current step are valid
            validationStepper.next();
        });

        // Personal info
        const FormValidation2 = FormValidation.formValidation(wizardValidationFormStep2, {
            fields: {
                manager_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Name'
                        },
                    }
                },
                manager_number: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Phone number'
                        },
                    }
                },
                manager_email: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Email'
                        },
                        emailAddress: {
                            message: 'The value is not a valid email address'
                        }
                    }
                },

            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    // Use this for enabling/changing valid/invalid class
                    // eleInvalidClass: '',
                    eleValidClass: '',
                    rowSelector: '.col-sm-6'
                }),
                autoFocus: new FormValidation.plugins.AutoFocus(),
                submitButton: new FormValidation.plugins.SubmitButton()
            }
        }).on('core.form.valid', function () {
            // Jump to the next step when all fields in the current step are valid
            validationStepper.next();
        });

        // Bootstrap Select (i.e Language select)
        if (selectPicker.length) {
            selectPicker.each(function () {
                var $this = $(this);
                $this.selectpicker().on('change', function () {
                    FormValidation2.revalidateField('formValidationLanguage');
                });
            });
        }

        // select2
        if (select2.length) {
            select2.each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this
                    .select2({
                        placeholder: 'Select an country',
                        dropdownParent: $this.parent()
                    })
                    .on('change', function () {
                        // Revalidate the color field when an option is chosen
                        FormValidation2.revalidateField('formValidationCountry');
                    });
            });
        }

        // Social links
        const FormValidation3 = FormValidation.formValidation(wizardValidationFormStep3, {
            fields: {
                // store_payment_type: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Enter Payment Type'
                //         },
                //     }
                // },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    // Use this for enabling/changing valid/invalid class
                    // eleInvalidClass: '',
                    eleValidClass: '',
                    rowSelector: '.col-sm-6'
                }),
                autoFocus: new FormValidation.plugins.AutoFocus(),
                submitButton: new FormValidation.plugins.SubmitButton()
            }
        }).on('core.form.valid', function () {
            // You can submit the form
            // wizardValidationForm.submit()
            // or send the form data to server via an Ajax request
            // To make the demo simple, I just placed an alert

            document.getElementById('wizard-validation-form').onsubmit = function (event) {
                // Perform any final validation or actions here.
                // If all is well, the form will be submitted.
                event.preventDefault();
                // if (submitted) return;
                $('#overlay').fadeIn(100);
                fetch('/storeGenerate/store', {
                    method: 'POST', // or 'GET' depending on your needs
                    body: new FormData(wizardValidationForm) // Serialize the form data
                }).then(response => response.json())
                    .then(data => {
                        //console.log(data);
                        if (data.status === 'success') {
                            // alert('Registration Done Successfully..!! now you can login');
                            Swal.fire({
                                icon: 'success',
                                title: 'Vendor Registration!',
                                text: 'Registration Successfully Done.'
                            }).then(() => {
                                $('#overlay').fadeOut(100);
                                window.location.href = '/master';
                            });

                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Vendor Registration!',
                                text: data.message
                            }).then(() => {
                                $('#overlay').fadeOut(100);
                                window.location.href = '/master';
                            });
                        }

                        // Handle the response from the server
                    })
                    .catch(error => {
                        console.log(error);
                        toastr.error('Error:', error.message);
                    });
            };

            // alert('Submitted..!!');
        });

        wizardValidationNext.forEach(item => {
            item.addEventListener('click', event => {
                // When click the Next button, we will validate the current step
                switch (validationStepper._currentIndex) {
                    case 0:
                        FormValidation1.validate();
                        break;

                    case 1:
                        FormValidation2.validate();
                        break;

                    case 2:
                        FormValidation3.validate();
                        break;

                    default:
                        break;
                }
            });
        });

        wizardValidationPrev.forEach(item => {
            item.addEventListener('click', event => {
                switch (validationStepper._currentIndex) {
                    case 2:
                        validationStepper.previous();
                        break;

                    case 1:
                        validationStepper.previous();
                        break;

                    case 0:

                    default:
                        break;
                }
            });
        });
    }
})();
