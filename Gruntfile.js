module.exports = function( grunt ) {

	'use strict';

	grunt.initConfig({

		pkg:    grunt.file.readJSON( 'package.json' ),

		sass: {
			options: {
				sourceComments: false
			},
			compile: {
				files: {
					'assets/css/style.css' : 'assets/css/scss/style.scss',
					'assets/css/admin.css' : 'assets/css/scss/admin.scss',
					'assets/css/editor.css' : 'assets/css/scss/editor.scss',
				}
			}
		},

		postcss: {
			options: {
				processors: [
					require('autoprefixer')(),
				]
			},
			dist: {
				src: 'assets/css/*.css'
			}
		},

	});

	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-postcss');

	grunt.registerTask( 'default', [ 'styles' ] );
	grunt.registerTask( 'styles', [ 'sass', 'postcss' ] );

	grunt.util.linefeed = '\n';

}
