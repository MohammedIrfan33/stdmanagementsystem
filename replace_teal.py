import os

dir_path = "resources/views/auth"
for root, dirs, files in os.walk(dir_path):
    for f in files:
        if f.endswith(".blade.php"):
            path = os.path.join(root, f)
            with open(path, "r") as file:
                content = file.read()
            
            original_content = content
            
            content = content.replace("bg-teal-800", "bg-teal-700")
            content = content.replace("hover:bg-teal-900", "hover:bg-teal-800")
            
            if content != original_content:
                with open(path, "w") as file:
                    file.write(content)
                print(f"Updated {path}")
