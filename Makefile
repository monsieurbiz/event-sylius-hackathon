build: INDEX.html INDEX_FR.html
	@echo "Build complete"

INDEX.html: INDEX.md
	bash -l bin/generate.sh INDEX.md INDEX.html

INDEX_FR.html: INDEX_FR.md
	bash -l bin/generate.sh INDEX_FR.md INDEX_FR.html

serve:
	symfony local:server:start
