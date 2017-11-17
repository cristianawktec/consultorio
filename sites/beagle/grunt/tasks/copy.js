/*Dist copy files*/

module.exports = function(grunt, data){

  return {
    dist:{
      files:[
        {expand: true, src: ['*','!light'], cwd: 'src/html', dest: 'dist/html' },
        {expand: true, src: ['**'], cwd: 'src/html/light', dest: 'dist/light' },
        {expand: true, src: ['**','!css/*'], cwd: 'src/assets', dest: 'dist/html/assets' },
        {expand: true, src: ['**','!app.js'], cwd: 'src/js', dest: 'dist/html/assets/js' }
      ]
    },
    light:{
    	files:[
			  {expand: true, src: [
						"css/**",
						"img/**",
						"js/main.js",
						"js/main.min.js",
						"lib/jquery/**",
						"lib/bootstrap/**",
						"lib/perfect-scrollbar/**",
						"lib/material-design-icons/**",
						"lib/roboto/**",
						"lib/jquery.niftymodals/**"
					], cwd: 'dist/html/assets', dest: 'dist/light/assets' 
				}
    	]
    }
  };
};