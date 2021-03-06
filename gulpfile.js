const   gulp = require( 'gulp' ),
        postcss = require('gulp-postcss'),
        autoprefixer = require('autoprefixer'),
        browserSync = require('browser-sync').create(),
        sass = require('gulp-sass'),
        cleanCSS = require('gulp-clean-css'),
        sourcemaps = require('gulp-sourcemaps'),
        rename = require('gulp-rename'),
        concat = require('gulp-concat'),
        imagemin = require('gulp-imagemin'),
        uglify = require('gulp-uglify-es').default,
        del = require('del');
        plumber = require('gulp-plumber');

const cfg = require('./gulpconfig.json');
const paths = cfg.paths;

gulp.task( 'sass', function() {
    return gulp.src( paths.sass + '/*.scss' )
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe( sass({
        errorLogToConsole: true,
        outputStyle: 'expanded' 
    }).on('error', sass.logError ))
    .pipe(postcss([autoprefixer()]))
    .pipe(sourcemaps.write(undefined, { sourceRoot: null }))
    .pipe(gulp.dest(paths.css));
});

gulp.task('minifycss', function() {
    return gulp.src(`${paths.css}/main.css`)
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe( cleanCSS() )
    .pipe( rename({ suffix: '.min' }) )
    .pipe(sourcemaps.write('./'))
    .pipe( gulp.dest(paths.css) )
});

gulp.task('styles', function(callback) {
	gulp.series('sass', 'minifycss')(callback);
});

gulp.task('watch', function() {
    // css
    gulp.watch(`${paths.sass}/**/*.scss`, gulp.series('styles') );
    // js 
    gulp.watch( 
        [
            `${paths.js}/*.js`,
            `!${paths.js}/main.js`,
            `!${paths.js}/main.min.js`,
        ]
        , gulp.series('scripts') );
    // image
});

gulp.task('browser-sync', function() {
    browserSync.init(cfg.browserSyncWatchFiles, cfg.browserSyncOptions);
});

gulp.task('scripts', function() {
    var scripts = [
        `${paths.src}/slick-carousel/slick.js`,
        `${paths.src}/owl-carousel/js/owl.carousel.js`,
        `${paths.src}/owl-carousel/js/owl.animate.js`,
        `${paths.src}/owl-carousel/js/owl.autoheight.js`,
        `${paths.src}/owl-carousel/js/owl.autoplay.js`,
        `${paths.src}/owl-carousel/js/owl.autorefresh.js`,
        `${paths.src}/owl-carousel/js/owl.hash.js`,
        `${paths.src}/owl-carousel/js/owl.lazyload.js`,
        `${paths.src}/owl-carousel/js/owl.navigation.js`,
        `${paths.src}/owl-carousel/js/owl.support.js`,
        // `${paths.src}/owl-carousel/js/owl.support.modernizr.js`,
        `${paths.src}/owl-carousel/js/owl.video.js`,

        // Main js
        `${paths.js}/functions.js`
    ];
    
    return gulp.src(scripts, { allowEmpty: true })
    .pipe(concat('main.js'))
    .pipe(gulp.dest(paths.js))
    .pipe(rename('main.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.js));
});

gulp.task('copy-assets', function(done) {
    // Copy all Font Awesome Fonts && Copy all Font Awesome SCSS files
	gulp
    .src(`${paths.node}/@fortawesome/fontawesome-free/webfonts/**/*.{ttf,woff,woff2,eot,svg}`)
    .pipe(gulp.dest('./fonts'));
	gulp
    .src(`${paths.node}/@fortawesome/fontawesome-free/scss/*.scss`)
    .pipe(gulp.dest(`${paths.src}/fontawesome`));

    // Copy all Web Fonts
    gulp
    .src(`${paths.node}/opensans-npm-webfont/fonts/**/*.{ttf,woff,woff2}`)
    .pipe(gulp.dest('./css/fonts'));
    gulp
    .src(`${paths.node}/opensans-npm-webfont/**/*.scss`)
    .pipe(gulp.dest(`${paths.src}/fonts/opensans`));
    //
    gulp
    .src(`${paths.node}/roboto-npm-webfont/full/fonts/**/*.{eot,ttf,woff,woff2}`)
    .pipe(gulp.dest('./css/fonts'));
    gulp
    .src(`${paths.node}/roboto-npm-webfont/full/**/*.scss`)
    .pipe(gulp.dest(`${paths.src}/fonts/roboto`));
    //
    gulp
    .src(`${paths.node}/@webwingscz/googlefont-montserrat/fonts/**/*.ttf`)
    .pipe(gulp.dest('./css/fonts'));
    gulp
    .src(`${paths.node}/@webwingscz/googlefont-montserrat/**/*.scss`)
    .pipe(gulp.dest(`${paths.src}/fonts/montserrat`));

    // Slick carousel
    gulp
    .src(`${paths.node}/slick-carousel/slick/**/*.{scss,js,eot}`)
    .pipe(gulp.dest(`${paths.src}/slick-carousel`));
    gulp 
    .src(`${paths.node}/slick-carousel/slick/fonts/*.{svg,ttf,woff}`)
    .pipe(gulp.dest(`./css/fonts`));
    // Owl carousel 
    gulp
    .src(`${paths.node}/owl.carousel/src/**/*`)
    .pipe(gulp.dest(`${paths.src}/owl-carousel`));

    done();
});

gulp.task('cleanup', function() {
	return del(['src/**/*', 'fonts/**/*', 'css/fonts/*']);
});

gulp.task('watch-bs', gulp.parallel('browser-sync', 'watch'));