import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';

registerBlockType('blp/business-services', {
    title: 'Services',
    icon: 'businessman',
    category: 'widgets',
    edit() {
        const blockProps = useBlockProps();
        return (
            <div {...blockProps}>
                <p>Services Block</p>
            </div>
        );
    },
    save() {
        const blockProps = useBlockProps.save();
        return (
            <div {...blockProps}>
                <p>Services Block</p>
            </div>
        );
    }
});
