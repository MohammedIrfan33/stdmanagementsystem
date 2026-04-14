import os

dir_path = "resources/views"
for root, dirs, files in os.walk(dir_path):
    for f in files:
        if f.endswith(".blade.php"):
            path = os.path.join(root, f)
            with open(path, "r") as file:
                content = file.read()
            
            original_content = content
            
            # Since the user specifically requested 'teal-700'
            content = content.replace("bg-teal-600", "bg-teal-700")
            content = content.replace("hover:bg-teal-700", "hover:bg-teal-800")
            
            if content != original_content:
                with open(path, "w") as file:
                    file.write(content)
                print(f"Updated {path}")
