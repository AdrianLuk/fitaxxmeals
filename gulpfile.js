// First install the required node modules
// Then inport them as variables
var gulp = require("gulp"),
    // gulp-sass compiles SASS files to CSS
    sass = require("gulp-sass"),
    // gulp-clean-css minifies CSS files
    cleanCSS = require("gulp-clean-css"),
    // gulp-uglify minifies JavaScript files
    uglify = require("gulp-uglify"),
    // babel = require("gulp-babel"),
    // gulp-concat merges files together and renames them
    concat = require("gulp-concat"),
    // These are the directories with files which we are compiling/minifying
    // * is a glob
    // 1 * = ALL files in current directory
    // 2 ** = ALL files in this directory and ALL sub-directories
    input = {
        foundation_sass: "source/foundation-sites/assets/foundation.scss",
        sass: "source/scss/*.scss",
        javascript: "source/js/*.js"
    },
    // These are the directories where we are sending files to
    output = {
        foundation: "public_html/wp-content/themes/fitaxxmeals/css",
        style: "public_html/wp-content/themes/fitaxxmeals",
        javascript: "public_html/wp-content/themes/fitaxxmeals/js"
        // react: "public_html/wp-content/themes/pace/js"
    };

// Compile and minify Foundation SCSS files
// First parameter is a terminal command which can be run with the gulp command
// gulp build-foundation
gulp.task("build-foundation", function() {
    return (
        gulp
            .src(input.foundation_sass)
            // Compile SCSS
            // pipe() is a method to organize the pipeline which determines the order of operations
            .pipe(
                sass({
                    // includePaths is used to direct gulp
                    // to required @import paths in your SASS
                    includePaths: [
                        "../scss/foundation",
                        "../foundation-sites/scss/global"
                    ]
                })
            )
            // Minify CSS
            // By default gulp-clean-css removes ALL comments
            // specialComments: 'all' just means include certain block comments
            // that look like this: /*! */
            .pipe(cleanCSS({ level: { 1: { specialComments: "all" } } }))
            // Merge all files and rename
            .pipe(concat("foundation.css"))
            // Export to foundation output directory
            .pipe(gulp.dest(output.foundation))
    );
});

// Compile and minify custom SCSS files
// gulp build-css
gulp.task("build-css", function() {
    return (
        gulp
            .src(input.sass)
            // Compile SCSS
            // pipe() is a method to organize the pipeline which determines the order of operations
            .pipe(
                sass({
                    // includePaths is used to direct gulp
                    // to required @import paths in your SASS
                    includePaths: [
                        "../foundation-sites/scss/settings/_settings"
                    ]
                })
            )
            // Minify CSS
            // By default gulp-clean-css removes ALL comments
            // specialComments: 'all' just means include certain block comments
            // that look like this: /*! */
            .pipe(cleanCSS({ level: { 1: { specialComments: "all" } } }))
            // Merge all files and rename
            .pipe(concat("main.css"))
            // Export to foundation output directory
            .pipe(gulp.dest(output.style))
    );
});

// Compile and minify JS files
gulp.task("build-javascript", function() {
    return (
        gulp
            .src(input.javascript)
            //babel
            // .pipe(
            //     babel({
            //         presets: ["es2015", "react"]
            //     })
            // )
            // Merge and rename JS
            .pipe(uglify())
            .pipe(concat("bundle.js"))
            // Minify JS
            // Export to JS out directory
            .pipe(gulp.dest(output.javascript))
    );
});
// gulp.task("build-react", function() {
//     return (
//         gulp
//             .src(input.react)
//             //babel
//             .pipe(
//                 babel({
//                     presets: ["env", "react"]
//                 })
//             )
//             .pipe(concat("app.js"))
//             .pipe(gulp.dest(output.react))
//     );
// });
// Watch these files for changes and run the task on update
gulp.task("watch", function() {
    gulp.watch(input.foundation_sass, ["build-foundation"]);
    gulp.watch(input.sass, ["build-css"]);
    gulp.watch(input.javascript, ["build-javascript"]);
    // gulp.watch(input.react, ["build-react"]);
});

// Run the watch task when gulp is called without arguments
gulp.task("default", ["watch"]);
