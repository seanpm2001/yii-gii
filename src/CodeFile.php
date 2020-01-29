use Yiisoft\Html\Html;
final class CodeFile
    /**
     * The new file mode
     */
    private const FILE_MODE = 0666;
    /**
     * The new directory mode
     */
    private const DIR_MODE = 0777;
    public const OP_CREATE = 0;
    public const OP_OVERWRITE = 1;
    public const OP_SKIP = 2;
    private string $id;
    private string $path;
    private string $content;
    private string $operation;
    /**
     * @var string the base path
     */
    private string $basePath;
    /**
     * @var int the permission to be set for newly generated code files.
     * This value will be used by PHP chmod function.
     * Defaults to 0666, meaning the file is read-writable by all users.
     */
    private int $newFileMode = self::FILE_MODE;
    /**
     * @var int the permission to be set for newly generated directories.
     * This value will be used by PHP chmod function.
     * Defaults to 0777, meaning the directory can be read, written and executed by all users.
     */
    private int $newDirMode = self::DIR_MODE;
    public function __construct(string $path, string $content)
                if ($this->newDirMode !== self::DIR_MODE) {
                    $mask = @umask(0);
                    $result = @mkdir($dir, $this->newDirMode, true);
                    @umask($mask);
                } else {
                    $result = @mkdir($dir, 0777, true);
                }
        if ($this->newFileMode !== self::FILE_MODE) {
            $mask = @umask(0);
            @chmod($this->path, $this->newFileMode);
            @umask($mask);
        }
    public function getRelativePath(): string
        if (strpos($this->path, $this->basePath) === 0) {
            return substr($this->path, strlen($this->basePath) + 1);
    public function getType(): string
    private function renderDiff($lines1, $lines2): string

    public function getId(): string
    {
        return $this->id;
    }

    public function getOperation(): string
    {
        return $this->operation;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function withBasePath(string $basePath): CodeFile
    {
        $this->basePath = $basePath;

        return $this;
    }

    public function withNewFileMode(int $mode): CodeFile
    {
        $this->newFileMode = $mode;

        return $this;
    }

    public function withNewDirMode(int $mode): CodeFile
    {
        $this->newDirMode = $mode;

        return $this;
    }