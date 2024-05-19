function formatListText(text) {
    var newText = text
        .split("|")
        .map(function (sentence) {
            return "<li>" + sentence.trim() + "</li>";
        })
        .join("");
    return newText;
}

function loadPreviewSection(selector, previewSelector, titleSelector) {
    $(titleSelector).text($(selector).val());
    $(previewSelector).text($(selector).val());
}

function loadPreviewSubSection(selectorRole, selectorCompany, previewSelector) {
    if ($(selectorCompany).val() === "") {
        $(previewSelector).text(
            $(selectorRole).val() + " " + $(selectorCompany).val()
        );
    } else {
        $(previewSelector).text(
            $(selectorRole).val() + " in " + $(selectorCompany).val()
        );
    }
}

function loadPreviewSubSectionDash(
    selectorRole,
    selectorCompany,
    previewSelector
) {
    if ($(selectorCompany).val() === "") {
        $(previewSelector).text(
            $(selectorRole).val() + " " + $(selectorCompany).val()
        );
    } else {
        $(previewSelector).text(
            $(selectorRole).val() + " - " + $(selectorCompany).val()
        );
    }
}

function loadPreview(selector, previewSelector) {
    $(previewSelector).text($(selector).val());
}

function loadPreviewComma(selector, previewSelector) {
    $(previewSelector).text($(selector).val() + ", ");
}

function loadPreviewSlash(selector, previewSelector) {
    $(previewSelector).text($(selector).val() + "/");
}

function loadPreviewDash(selector, previewSelector) {
    if ($(selector).val() === "") {
        $(previewSelector).text($(selector).val());
    } else {
        $(previewSelector).text(" - " + $(selector).val());
    }
}

function loadPreviewList(selector, previewSelector) {
    var previewWorkAchievement = formatListText($(selector).val());
    $(previewSelector).html(previewWorkAchievement);
}

function loadPreviewCheck(
    selector,
    endMonthSelector,
    endYearSelector,
    previewEndMonth,
    previewEndYear
) {
    if (selector.checked) {
        $(endMonthSelector).val(null);
        $(endYearSelector).val(null);

        $(previewEndMonth).text("- Present");
        $(previewEndYear).text("");

        $(endMonthSelector).attr("disabled", true);
        $(endYearSelector).attr("disabled", true);
    } else {
        $(previewEndMonth).text("");
        $(previewEndYear).text("");

        $(endMonthSelector).attr("disabled", false);
        $(endYearSelector).attr("disabled", false);
    }
}

function loadPreviewActivityYear(selector, previewSelector) {
    $(previewSelector).text("(" + $(selector).val() + "): ");
}

function locationHash(active, [initial]) {
    $(active).removeAttr("hidden");
    $(active + "_nav").addClass("bg-white");

    array.forEach((initial) => {
        $(initial).attr("hidden", true);
        $(initial + "_nav").removeClass("bg-white");
    });
}

$(document).ready(function () {
    if (window.location.hash === "#personal" || window.location.hash === "") {
        $("#personal").removeAttr("hidden");
        $("#personal_nav").addClass("bg-white");

        $("#professional").attr("hidden", true);
        $("#professional_nav").removeClass("bg-white");
        
        $("#education").attr("hidden", true);
        $("#education_nav").removeClass("bg-white");
        
        $("#organisation").attr("hidden", true);
        $("#organisation_nav").removeClass("bg-white");

        $("#other").attr("hidden", true);
        $("#other_nav").removeClass("bg-white");
    }

    if (window.location.hash === "#professional") {
        $("#professional").removeAttr("hidden");
        $("#professional_nav").addClass("bg-white");

        $("#personal").attr("hidden", true);
        $("#personal_nav").removeClass("bg-white");
        
        $("#education").attr("hidden", true);
        $("#education_nav").removeClass("bg-white");
        
        $("#organisation").attr("hidden", true);
        $("#organisation_nav").removeClass("bg-white");
        
        $("#other").attr("hidden", true);
        $("#other_nav").removeClass("bg-white");
    }

    if (window.location.hash === "#education") {
        $("#education").removeAttr("hidden");
        $("#education_nav").addClass("bg-white");
        
        $("#personal").attr("hidden", true);
        $("#personal_nav").removeClass("bg-white");

        $("#professional").attr("hidden", true);
        $("#professional_nav").removeClass("bg-white");
        
        $("#organisation").attr("hidden", true);
        $("#organisation_nav").removeClass("bg-white");
        
        $("#other").attr("hidden", true);
        $("#other_nav").removeClass("bg-white");
    }

    if (window.location.hash === "#organisation") {
        $("#organisation").removeAttr("hidden");
        $("#organisation_nav").addClass("bg-white");

        $("#personal").attr("hidden", true);
        $("#personal_nav").removeClass("bg-white");

        $("#professional").attr("hidden", true);
        $("#professional_nav").removeClass("bg-white");
        
        $("#education").attr("hidden", true);
        $("#education_nav").removeClass("bg-white");

        $("#other").attr("hidden", true);
        $("#other_nav").removeClass("bg-white");
    }

    if (window.location.hash === "#other") {
        $("#other").removeAttr("hidden");
        $("#other_nav").addClass("bg-white");
        
        $("#personal").attr("hidden", true);
        $("#personal_nav").removeClass("bg-white");

        $("#professional").attr("hidden", true);
        $("#professional_nav").removeClass("bg-white");
        
        $("#education").attr("hidden", true);
        $("#education_nav").removeClass("bg-white");
        
        $("#organisation").attr("hidden", true);
        $("#organisation_nav").removeClass("bg-white");
    }

    $(window).on("popstate", function () {
        if (window.location.hash === "#personal" || window.location.hash === "") {
            $("#personal").removeAttr("hidden");
            $("#personal_nav").addClass("bg-white");
    
            $("#professional").attr("hidden", true);
            $("#professional_nav").removeClass("bg-white");
            
            $("#education").attr("hidden", true);
            $("#education_nav").removeClass("bg-white");
            
            $("#organisation").attr("hidden", true);
            $("#organisation_nav").removeClass("bg-white");
    
            $("#other").attr("hidden", true);
            $("#other_nav").removeClass("bg-white");
        }
    
        if (window.location.hash === "#professional") {
            $("#professional").removeAttr("hidden");
            $("#professional_nav").addClass("bg-white");
    
            $("#personal").attr("hidden", true);
            $("#personal_nav").removeClass("bg-white");
            
            $("#education").attr("hidden", true);
            $("#education_nav").removeClass("bg-white");
            
            $("#organisation").attr("hidden", true);
            $("#organisation_nav").removeClass("bg-white");
            
            $("#other").attr("hidden", true);
            $("#other_nav").removeClass("bg-white");
        }
    
        if (window.location.hash === "#education") {
            $("#education").removeAttr("hidden");
            $("#education_nav").addClass("bg-white");
            
            $("#personal").attr("hidden", true);
            $("#personal_nav").removeClass("bg-white");
    
            $("#professional").attr("hidden", true);
            $("#professional_nav").removeClass("bg-white");
            
            $("#organisation").attr("hidden", true);
            $("#organisation_nav").removeClass("bg-white");
            
            $("#other").attr("hidden", true);
            $("#other_nav").removeClass("bg-white");
        }
    
        if (window.location.hash === "#organisation") {
            $("#organisation").removeAttr("hidden");
            $("#organisation_nav").addClass("bg-white");
    
            $("#personal").attr("hidden", true);
            $("#personal_nav").removeClass("bg-white");
    
            $("#professional").attr("hidden", true);
            $("#professional_nav").removeClass("bg-white");
            
            $("#education").attr("hidden", true);
            $("#education_nav").removeClass("bg-white");
    
            $("#other").attr("hidden", true);
            $("#other_nav").removeClass("bg-white");
        }
    
        if (window.location.hash === "#other") {
            $("#other").removeAttr("hidden");
            $("#other_nav").addClass("bg-white");
            
            $("#personal").attr("hidden", true);
            $("#personal_nav").removeClass("bg-white");
    
            $("#professional").attr("hidden", true);
            $("#professional_nav").removeClass("bg-white");
            
            $("#education").attr("hidden", true);
            $("#education_nav").removeClass("bg-white");
            
            $("#organisation").attr("hidden", true);
            $("#organisation_nav").removeClass("bg-white");
        }
    });

    // Section Personal
    $("#preview_name").text($("#name").val());

    $("#name").on("input", function () {
        var newText = $(this).val();
        $("#preview_name").text(newText);
    });

    $("#preview_phone").text($("#phone").val());

    $("#phone").on("input", function () {
        var newText = $(this).val();
        $("#preview_phone").text(newText);
    });

    $("#preview_email").text($("#email").val());

    $("#email").on("input", function () {
        var newText = $(this).val();
        $("#preview_email").text(newText);
    });

    $("#preview_linkedin").text($("#linkedin").val());

    $("#linkedin").on("input", function () {
        var newText = $(this).val();
        $("#preview_linkedin").text(newText);
    });

    $("#preview_website").text($("#website").val());

    $("#website").on("input", function () {
        var newText = $(this).val();
        $("#preview_website").text(newText);
    });

    $("#preview_address").text($("#address").val());

    $("#address").on("input", function () {
        var newText = $(this).val();
        $("#preview_address").text(newText);
    });

    $("#preview_description").text($("#description").val());

    $("#description").on("input", function () {
        var newText = $(this).val();
        $("#preview_description").text(newText);
    });

    // Section Professional
    loadPreviewSection(
        "#professional_section_name",
        "#preview_professional_section_name",
        "#title_professional_section_name"
    );

    $("#professional_section_name").on("input", function () {
        loadPreviewSection(
            "#professional_section_name",
            "#preview_professional_section_name",
            "#title_professional_section_name"
        );
    });

    $("#company_name").on("input", function () {
        loadPreview("#company_name", "#preview_company_name");
        loadPreviewSubSection(
            "#role_title",
            "#company_name",
            "#professional_name"
        );
    });

    $("#role_title").on("input", function () {
        loadPreview("#role_title", "#preview_role_title");
        loadPreviewSubSection(
            "#role_title",
            "#company_name",
            "#professional_name"
        );
    });

    $("#company_location").on("input", function () {
        loadPreviewDash("#company_location", "#preview_company_location");
    });

    $("#company_description").on("input", function () {
        loadPreview("#company_description", "#preview_company_description");
    });

    $("#start_month").on("input", function () {
        loadPreview("#start_month", "#preview_start_month");
    });

    $("#start_year").on("input", function () {
        loadPreview("#start_year", "#preview_start_year");
    });

    $("#end_month").on("input", function () {
        loadPreviewDash("#end_month", "#preview_end_month");
    });

    $("#end_year").on("input", function () {
        loadPreview("#end_year", "#preview_end_year");
    });

    $("#work_achievement").on("input", function () {
        loadPreviewList("#work_achievement", "#preview_work_achievement");
    });

    $("#btn_experience_add").click(function () {
        $("#experience_add").removeAttr("hidden");
        $("#experience_new").removeAttr("hidden");
        $(this).attr("hidden", true);
    });

    $("#btn_experience_remove").click(function () {
        $("#btn_experience_add").removeAttr("hidden");
        $("#experience_add").attr("hidden", true);
        $("#experience_new").attr("hidden", true);
    });

    $("#currently_work").on("change", function () {
        loadPreviewCheck(
            this,
            "#end_month",
            "#end_year",
            "#preview_end_month",
            "#preview_end_year"
        );
    });

    // Education Section
    loadPreviewSection(
        "#education_section_name",
        "#preview_education_section_name",
        "#title_education_section_name"
    );

    $("#education_section_name").on("input", function () {
        loadPreviewSection(
            "#education_section_name",
            "#preview_education_section_name",
            "#title_education_section_name"
        );
    });

    $("#school_name").on("input", function () {
        loadPreview("#school_name", "#preview_school_name");
        loadPreview("#school_name", "#education_name");
    });

    $("#school_location").on("input", function () {
        loadPreviewDash("#school_location", "#preview_school_location");
    });

    $("#education_start_month").on("input", function () {
        loadPreview("#education_start_month", "#preview_education_start_month");
    });

    $("#education_start_year").on("input", function () {
        loadPreview("#education_start_year", "#preview_education_start_year");
    });

    $("#education_end_month").on("input", function () {
        loadPreviewDash("#education_end_month", "#preview_education_end_month");
    });

    $("#education_end_year").on("input", function () {
        loadPreview("#education_end_year", "#preview_education_end_year");
    });

    $("#education_level").on("input", function () {
        loadPreviewComma("#education_level", "#preview_education_level");
    });

    $("#education_description").on("input", function () {
        loadPreviewComma(
            "#education_description",
            "#preview_education_description"
        );
    });

    $("#gpa").on("input", function () {
        loadPreviewSlash("#gpa", "#preview_gpa");
    });

    $("#max_gpa").on("input", function () {
        loadPreview("#max_gpa", "#preview_max_gpa");
    });

    $("#education_achievement").on("input", function () {
        loadPreviewList(
            "#education_achievement",
            "#preview_education_achievement"
        );
    });

    // Organisation Section
    loadPreviewSection(
        "#organisation_section_name",
        "#preview_organisation_section_name",
        "#title_organisation_section_name"
    );

    $("#organisation_section_name").on("input", function () {
        loadPreviewSection(
            "#organisation_section_name",
            "#preview_organisation_section_name",
            "#title_organisation_section_name"
        );
    });

    $("#organisation_name").on("input", function () {
        loadPreview("#organisation_name", "#preview_organisation_name");
        loadPreviewSubSectionDash(
            "#position_title",
            "#organisation_name",
            "#organisation_subsection_name"
        );
    });

    $("#position_title").on("input", function () {
        loadPreview("#position_title", "#preview_position_title");
        loadPreviewSubSectionDash(
            "#position_title",
            "#organisation_name",
            "#organisation_subsection_name"
        );
    });

    $("#organisation_description").on("input", function () {
        loadPreview(
            "#organisation_description",
            "#preview_organisation_description"
        );
    });

    $("#organisation_location").on("input", function () {
        loadPreviewDash(
            "#organisation_location",
            "#preview_organisation_location"
        );
    });

    $("#organisation_start_month").on("input", function () {
        loadPreview(
            "#organisation_start_month",
            "#preview_organisation_start_month"
        );
    });

    $("#organisation_start_year").on("input", function () {
        loadPreview(
            "#organisation_start_year",
            "#preview_organisation_start_year"
        );
    });

    $("#organisation_end_month").on("input", function () {
        loadPreviewDash(
            "#organisation_end_month",
            "#preview_organisation_end_month"
        );
    });

    $("#organisation_end_year").on("input", function () {
        loadPreview("#organisation_end_year", "#preview_organisation_end_year");
    });

    $("#role_description").on("input", function () {
        loadPreviewList("#role_description", "#preview_role_description");
    });

    $("#currently_active").on("change", function () {
        loadPreviewCheck(
            this,
            "#organisation_end_month",
            "#organisation_end_year",
            "#preview_organisation_end_month",
            "#preview_organisation_end_year"
        );
    });

    // Other Section
    loadPreviewSection(
        "#other_section_name",
        "#preview_other_section_name",
        "#title_other_section_name"
    );

    $("#other_section_name").on("input", function () {
        loadPreviewSection(
            "#other_section_name",
            "#preview_other_section_name",
            "#title_other_section_name"
        );
    });

    $("#activity_name").on("input", function () {
        loadPreview("#activity_name", "#other_subsection_name");
        loadPreview("#activity_name", "#preview_activity_name");
    });

    $("#activity_year").on("input", function () {
        loadPreviewActivityYear("#activity_year", "#preview_activity_year");
    });

    $("#activity_elaboration").on("input", function () {
        loadPreview("#activity_elaboration", "#preview_activity_elaboration");
    });
});
