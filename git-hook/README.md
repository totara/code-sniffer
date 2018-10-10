# Git pre-commit hook

The git hook provided will check the files which are to be committed via Code Sniffer and rejects the commit if it finds violations.

## Installation 

The easiest way to install the hook is to link the `pre-commit` file to your `.git/hooks` folder of your project:

```
# Ensure that the hook is executable:
chmod +x pre-commit

# create a symbolic link
ln -s $(pwd)/pre-commit /path/to/your/project/.git/hooks/
```

Of course you can copy the hook file to your .git/hooks folder instead of linking it. But in this case you would manually have to update the file when the original in this project changes. 

## Config

There is a template for a config file `config.dist` which you can copy to `config` and edit to your liking.

The use of your own config file is purely optional. The hook works out of the box with sensible defaults.