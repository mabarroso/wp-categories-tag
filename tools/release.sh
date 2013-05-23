mkdir out &>/dev/null
mkdir out/categories-tag &>/dev/null
rm out/categories-tag/*
cp README.md		    		    out/categories-tag
cp -r src/* 				    		out/categories-tag
cd out
zip categories-tag.zip categories-tag/*
tar -cvf categories-tag.tar.gz categories-tag/*
cd ..
